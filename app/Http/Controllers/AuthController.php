<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(){

        $data = [
            'page_title' => 'Masuk',
            'page' => 'login',
        ];
        return view('auth.login', $data);
    }

    public function loginAction(LoginRequest $request){
        $validatedData = $request->validated();

        if (Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/overview');
        }

        return back()->with('failed-status', 'Pastikan data dan akun sudah terdaftar.');
    }


    public function register(){
        $data = [
            'page_title' => 'Daftar',
            'page' => 'register'
        ];

        return view('auth.register', $data);
    }

    public function registerAction(RegisterRequest $request){
        $validatedData = $request->validated();
        $validatedData['role_id'] = '1';

        User::create($validatedData);

        return redirect()->route('login')->with('success-message', 'Akun berhasil dibuat.');

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


}
