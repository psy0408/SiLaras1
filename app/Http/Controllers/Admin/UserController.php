<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Render halaman user admin
     */
    public function index()
    {
        return view('admin.user-ad');
    }

    /**
     * GET  /admin/api/users?search=...
     * Kembalikan semua user (role = user), support search
     */
    public function getUsers(Request $request)
    {
        $search = $request->input('search', '');

        $users = User::where('role', 'user')
            ->when($search !== '', function ($q) use ($search) {
                $like = '%' . $search . '%';
                $q->where(function ($sub) use ($like) {
                    $sub->where('name',  'like', $like)
                        ->orWhere('email', 'like', $like)
                        ->orWhere('username',  'like', $like);
                });
            })
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($user) {
                // Tambahkan URL foto profil
                $user->profile_photo_url = $user->profile_photo 
                    ? asset('storage/' . $user->profile_photo) 
                    : null;
                return $user;
            });

        return response()->json(['success' => true, 'data' => $users]);
    }

    /**
     * POST /admin/api/users
     * Tambah user baru
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'     => ['required', 'string', 'min:2', 'max:255'],
                'email'    => ['required', 'email', 'unique:users,email'],
                'username'     => ['required', 'string', 'unique:users,username', 'min:10', 'max:10'],
                'password' => ['required', 'string', 'min:8'],
            ], [
                'name.required'      => 'Nama user wajib diisi.',
                'name.min'           => 'Nama harus minimal 2 karakter.',
                'email.required'     => 'Email wajib diisi.',
                'email.email'        => 'Format email tidak valid.',
                'email.unique'       => 'Email ini sudah terdaftar.',
                'username.required'      => 'Username wajib diisi.',
                'username.unique'        => 'Username ini sudah terdaftar.',
                'username.min'           => 'Username harus 10 karakter.',
                'username.max'           => 'Username harus 10 karakter.',
                'password.required'  => 'Password wajib diisi.',
                'password.min'       => 'Password harus minimal 8 karakter.',
            ]);

            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'username'     => $validated['username'],
                'password' => Hash::make($validated['password']),
                'role'     => 'user',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User berhasil ditambahkan.',
                'data'    => $user,
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->errors(),
            ], 422);
        }
    }

    /**
     * PUT /admin/api/users/{id}
     * Update email & username user
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();

        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'email', 'unique:users,email,' . $id],
                'username'  => ['required', 'string', 'unique:users,username,' . $id, 'min:5', 'max:20'],
            ], [
                'name.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email'    => 'Format email tidak valid.',
                'email.unique'   => 'Email ini sudah digunakan user lain.',
                'username.required'  => 'Username wajib diisi.',
                'username.unique'    => 'Username ini sudah digunakan user lain.',
                'username.min'       => 'Username harus minimal 5 karakter.',
            ]);

            $user->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'User berhasil diupdate.',
                'data'    => $user->fresh(),
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->errors(),
            ], 422);
        }
    }

    /**
     * POST /admin/api/users/{id}/reset-password
     * Reset password user
     */
    public function resetPassword(Request $request, string $id)
    {
        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();

        try {
            $validated = $request->validate([
                'password'              => ['required', 'string', 'min:8'],
                'password_confirmation' => ['required', 'same:password'],
            ], [
                'password.required'              => 'Password baru wajib diisi.',
                'password.min'                   => 'Password harus minimal 8 karakter.',
                'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
                'password_confirmation.same'     => 'Konfirmasi password tidak cocok.',
            ]);

            $user->update(['password' => Hash::make($validated['password'])]);

            return response()->json([
                'success' => true,
                'message' => 'Password berhasil direset.',
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->errors(),
            ], 422);
        }
    }

    /**
     * DELETE /admin/api/users/{id}
     * Hapus user
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();

        // Hapus foto profil jika ada
        if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus.',
        ]);
    }

    /**
     * DELETE /admin/api/users/{id}/delete-photo
     * Hapus foto profil user (admin action)
     */
    public function deleteUserPhoto(string $id)
    {
        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();

        if ($user->profile_photo) {
            // Hapus file foto dari storage
            if (Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            
            // Update database
            $user->profile_photo = null;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Foto profil user berhasil dihapus.',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'User tidak memiliki foto profil.',
        ], 404);
    }
}