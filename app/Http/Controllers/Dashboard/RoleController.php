<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request){
        return view('dashboard.roles.index', [
            'page_title' => 'Hak Akses',
            'page' => 'roles',
        ]);
    }

    public function create(){

    }

    public function store(){

    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){

    }
}
