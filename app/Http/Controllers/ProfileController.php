<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show user profile page
     */
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();

        $totalReports = $user->reports()->count();
        
        return view('profil', compact('totalReports'));
    }

    /**
     * Upload profile photo
     */
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);
 
        /** @var User $user */
        $user = auth()->user();
 
        // Delete old photo if exists
        if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
            Storage::disk('public')->delete($user->profile_photo);
        }
 
        // Store new photo
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
 
        // Update user profile_photo
        $user->update([
            'profile_photo' => $path
        ]);
 
        return back()->with('success', 'Foto profil berhasil diupdate!');
    }
 
    /**
     * Delete profile photo
     */
    public function deletePhoto()
    {
        /** @var User $user */
        $user = auth()->user();
 
        // Delete photo file if exists
        if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
            Storage::disk('public')->delete($user->profile_photo);
        }
 
        // Remove photo from database
        $user->update([
            'profile_photo' => null
        ]);
 
        return back()->with('success', 'Foto profil berhasil dihapus!');
    }
}