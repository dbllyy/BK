<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'Nama_Staff' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Menggunakan Nama_Staff dan password untuk autentikasi
        if (Auth::attempt(['Nama_Staff' => $credentials['Nama_Staff'], 'password' => $credentials['password']])) {
            // Autentikasi berhasil, redirect ke halaman home
            return redirect()->intended('home');
        }

        // Jika gagal, kembalikan ke halaman login dengan error
        return back()->withErrors([
            'Nama_Staff' => 'Nama Staff atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}
