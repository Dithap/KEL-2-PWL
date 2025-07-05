<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        $data = [
            'page_title' => 'Masuk'
        ];
        return view('auth.login', $data);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['username' => 'Username atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}