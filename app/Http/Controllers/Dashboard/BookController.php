<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request){
        $data = [
            'page_title' => 'Buku',
            'page' => 'books',
            'name' => $request->input('name', null),
            'category' => $request->input('category', null),
            'year' => $request->input('year', null),
            'author' => $request->input('author', null),
            'publisher' => $request->input('publisher', null),
            'rating' => $request->input('rating', null),
        ];

        if(is_role(['2'])){
            return view('dashboard.books.index', $data);
        }else{
            $book = Book::with(['category', 'enhancer']);

            if($data['category']){
                $book->where('category_id', decrypt_id($data['category']));
            }

            $data['books'] = $book->simplePaginate(12);
            return view('dashboard.books.members.index', $data);
        }

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
        $book = Book::with(['category', 'enhancer'])->findOrFail(decrypt_id($id));
        $relatedBooks = Book::with(['category', 'enhancer'])->where('id', '!=', $book->id)->take(6)->get();

        $data = [
            'page_title' => 'Rincian Buku',
            'page' => 'books',
            'book' => $book,
            'relatedBook' => $relatedBooks
        ];

        if(is_role(['2'])){
            return view('dashboard.books.show', $data);
        }else{
            $data['relatedBooks'] = $relatedBooks;
            $book->increment('viewers');
            return view('dashboard.books.members.show', $data);
        }

    }

    public function edit($id){
        $book = Book::with(['category', 'enhancer'])->findOrFail(decrypt_id($id));

        return view('dashboard.books.edit', [
            'page_title' => 'Tambah Buku',
            'page' => 'books',
            'book' => $book,
            'bookCategories' => BookCategory::all()
        ]);

    }

    public function update(BookRequest $bookRequest, $id){
        $book = Book::with(['category', 'enhancer'])->findOrFail(decrypt_id($id));
        $validatedData = $bookRequest->validated();

        if($bookRequest->has('cover_image')){
            $validatedData['cover_image'] = store_file($validatedData['cover_image'],'books')['randomFileName'];

            delete_file('books/'.$book->cover_image);
        }

        $book->update($validatedData);
        return redirect()->route('dashboard.books.index')->with('success-message', 'Berhasil mengubah data buku.');
    }

    public function borrow(Request $request, $id){

        $data = [
            'page_title' => 'Tambah Peminjam Buku',
            'page' => 'books',
            'book' => Book::with(['category', 'enhancer'])->findOrFail(decrypt_id($id)),
            'borrowers' => User::where('role_id', '=', '1')->get(),
        ];

        if($data['book']->quantity_total > 0){
            // $data['book']->decrement('quantity_total');
        }else{
            return redirect()->back()->with('warning-message', 'Buku sedang tidak tersedia.');
        }

        return view('dashboard.books.members.borrow', $data);
    }

    public function destroy($id){
        try{
            $book = Book::findOrFail(decrypt_id($id));
            $book->delete();

            return response()->json(['message' => 'Berhasil menghapus buku.']);
        }catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus buku.'], 500);
        }
    }
}
