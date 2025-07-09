<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategory;
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
        return view('dashboard.books.create', [
            'page_title' => 'Tambah Buku',
            'page' => 'books',
            'bookCategories' => BookCategory::all()
        ]);
    }

    public function store(BookRequest $bookRequest){
        $validatedData = $bookRequest->validated();
        $validatedData['cover_image'] = store_file($validatedData['cover_image'],'books')['randomFileName'];

        Book::create($validatedData);


        return redirect()->route('dashboard.books.index')->with('success-message', 'Berhasil menambahkan buku.');
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
