<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCategoryRequest;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index(Request $request){
        return view('dashboard.book-categories.index', [
            'page_title' => 'Kategori Buku',
            'page' => 'book-categories',
            'name' => $request->input('name', null),
        ]);
    }

    public function create(){
        return view('dashboard.book-categories.create', [
            'page_title' => 'Tambah Kategori Buku',
            'page' => 'book-categories',
        ]);
    }

    public function store(BookCategoryRequest $bookCategoryRequest){
        $validatedData = $bookCategoryRequest->validated();
        BookCategory::create($validatedData);

        return redirect()->route('dashboard.book.categories.index')->with('success-message', 'Berhasil menambahkan pengguna');
    }

    public function edit($id){
        $bookCategory = BookCategory::findOrFail(decrypt_id($id));

        return view('dashboard.book-categories.edit', [
            'page_title' => 'Ubah Kategori Buku',
            'page' => 'book-categories',
            'bookCategory' => $bookCategory,
        ]);
    }

    public function update(BookCategoryRequest $bookCategoryRequest, $id){
        $validatedData = $bookCategoryRequest->validated();
        $bookCategory = BookCategory::findOrFail(decrypt_id($id));

        $bookCategory->update($validatedData);
        return redirect()->route('dashboard.book.categories.show', ['id' => $id])->with('success-message', 'Berhasil mengubah pengguna');
    }

    public function show($id){

    }

    public function destroy($id){
        try{
            $bookCategory = BookCategory::findOrFail(decrypt_id($id));
            $bookCategory->delete();

            return response()->json(['message' => 'Berhasil menghapus pengguna.']);
        }catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus pengguna.'], 500);
        }
    }
}
