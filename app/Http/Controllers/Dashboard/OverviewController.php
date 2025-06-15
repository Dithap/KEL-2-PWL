<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index(){

        $data = [
            'page_title' => 'Beranda',
            'page' => 'overview'
        ];

        return view('dashboard.overview.index', $data);
    }
}
