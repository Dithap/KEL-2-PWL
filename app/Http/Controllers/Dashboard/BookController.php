<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request){
        return view('dashboard.books.index', [
            'page_title' => 'Buku',
            'page' => 'books',
            'name' => $request->input('name', null),
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
