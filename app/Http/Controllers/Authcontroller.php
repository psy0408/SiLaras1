<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek limit di awal (ambil data session)
        $attempts = $request->session()->get('login_attempts', 0);

        if ($attempts >= 3) {
            return back()->withErrors([
                'lockout' => 'Anda telah salah memasukkan data sebanyak 3 kali. Silakan hubungi admin.'
            ])
                ->with('show_forgot_password', true)
                ->with('login_attempts', $attempts)
                ->withInput($request->only('email', 'username'));
        }

        $credentials = $request->only('email', 'username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->forget('login_attempts');

            /** @var User $user */
            $user = auth()->user();

            return $user->isAdmin() ? redirect()->route('admin.admin') : redirect('home');
        }

        // JIKA GAGAL: Tambah hitungan menggunakan increment
        $attempts++;
        $request->session()->put('login_attempts', $attempts);

        // PENTING: Paksa simpan session sebelum redirect back
        $request->session()->save();

        if ($attempts >= 3) {
            return back()->withErrors([
                'lockout' => 'Anda telah salah memasukkan data sebanyak 3 kali. Silakan hubungi admin.'
            ])
                ->with('show_forgot_password', true)
                ->with('login_attempts', $attempts)
                ->withInput($request->only('email', 'username'));
        }

        return back()
            ->withErrors(['email' => 'Email / Username / Password salah'])
            ->withInput($request->only('email', 'username'));
    }

    // redirect ke contact admin
    public function showContactAdmin()
    {
        return view('auth.contact-admin');
    }


    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
