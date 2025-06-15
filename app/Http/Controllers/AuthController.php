<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){

        $data = [
            'page_title' => 'Masuk'
        ];

        return view('auth.login', $data);
    }
}
