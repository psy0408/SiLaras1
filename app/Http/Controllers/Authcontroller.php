<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'nisn' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'nisn', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // arahkan sesuai role
            if (auth()->user()->isAdmin()) {
                return redirect()->route('admin.admin');
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email / NISN / Password salah',
        ]);
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
