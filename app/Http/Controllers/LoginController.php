<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Melakukan proses login
    public function login(Request $request)
    {
        $request->validate([
            'nip' => ['required', 'numeric'], // Hanya memperbolehkan angka
            'password' => ['required', 'string'],
        ]);

        $credentials = $request->validate([
            'nip' => ['required', 'numeric'],
            'password' => ['required'],
        ]);

        //cek apakah login valid
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/dashboard'); 
            } else {
                return redirect()->intended('/dashboardd'); 
            }
        }
        return back()->withErrors([
            'email' => 'email atau Password Salah',
        ]);

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->intended('/dashboard');
        // } else {
        //     return back()->withInput()->withErrors(['email' => 'Email atau password salah.']);
        // }
    }

    // Melakukan proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
