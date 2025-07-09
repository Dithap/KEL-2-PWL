<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookLoanRequest;
use App\Models\Book;
use App\Models\BookLoan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookLoanController extends Controller
{
    public function index(Request $request){
        return view('dashboard.book-loans.index', [
            'page_title' => 'Peminjaman Buku',
            'page' => 'book-loans',
            'name' => $request->input('name', null),
        ]);
    }

    public function create(){
        return view('dashboard.book-loans.create', [
            'page_title' => 'Tambah Peminjam Buku',
            'page' => 'book-loans',
            'books' => Book::all(),
            'borrowers' => User::where('role_id', '=', '1')->get(),
        ]);
    }

    public function store(BookLoanRequest $bookLoanRequest){
        $validatedData = $bookLoanRequest->validated();
        $validatedData['status']  = Auth::user()->role_id == '2' ? '1' : '0';

        BookLoan::create($validatedData);


        return redirect()->route('dashboard.book.loans.index')->with('success-message', 'Berhasil melakukan peminjaman buku.');
    }

    public function show($id){

    }

    public function edit($id){
        $bookLoan = BookLoan::with(['borrower', 'book', 'enhancer'])->findOrFail(decrypt_id($id));

        return view('dashboard.book-loans.edit', [
            'page_title' => 'Ubah Peminjam Buku',
            'bookLoan' => $bookLoan,
            'page' => 'book-loans',
            'books' => Book::all(),
            'borrowers' => User::where('role_id', '=', '1')->get(),
        ]);
    }

    public function update(BookLoanRequest $bookLoanRequest, $id){
        $bookLoan = BookLoan::with(['borrower', 'book', 'enhancer'])->findOrFail(decrypt_id($id));

        $validatedData = $bookLoanRequest->validated();
        $validatedData['status']  = '0';

        $bookLoan->update($validatedData);

        return redirect()->route('dashboard.book.loans.index')->with('success-message', 'Berhasil mengubah data peminjaman buku.');

    }

    public function destroy($id){
        try{
            $bookLoan = BookLoan::findOrFail(decrypt_id($id));
            $bookLoan->delete();

            return response()->json(['message' => 'Berhasil menghapus data peminjaman buku.']);
        }catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data peminjaman buku.'], 500);
        }
    }
}
