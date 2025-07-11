<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $data = [
           'page_title' => 'Beranda',
            'page' => 'landing',
        ];

        return view('homepage.index', $data);
    }
}
