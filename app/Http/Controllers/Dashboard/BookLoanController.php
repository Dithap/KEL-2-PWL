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
        $data = [
            'page_title' => 'Peminjaman Buku',
            'page' => 'book-loans',
            'name' => $request->input('name', null),
            'category' => $request->input('category', null),
            'year' => $request->input('year', null),
            'author' => $request->input('author', null),
            'publisher' => $request->input('publisher', null),
            'rating' => $request->input('rating', null),
        ];

        if(is_role(['2'])){
            return view('dashboard.book-loans.index', $data);
        }else{
            // $data['books'] = Book::with(['category', 'enhancer'])->simplePaginate(12);
            $user = User::with('bookLoans')->find(Auth::user()->id);
            $data['books'] = $user->bookLoans->where('loan_status', '!=', 'returned')->where('status', '=', '1')->map(function ($loan) {
                return $loan->book;
            });

            // dd($data['books']);
            return view('dashboard.book-loans.members.index', $data);
        }
    }

    public function create(Request $request){

        $encryptedBookId = $request->input('book', null);

        $data = [
            'page_title' => 'Tambah Peminjam Buku',
            'page' => 'book-loans',
            'books' => Book::all(),
            'borrowers' => User::where('role_id', '=', '1')->get(),
            'isParamHaveBook' => false
        ];

        if($encryptedBookId){
            $book = Book::with(['category', 'enhancer'])->findOrFail(decrypt_id($encryptedBookId));
            $data['book'] = $book;
            $data['isParamHaveBook'] = true;

            if($book->quantity_total <= 0){
                return redirect()->back()->with('warning-message', 'Buku sedang tidak tersedia.');
            }
        }

        return view('dashboard.book-loans.create', $data);
    }

    public function store(BookLoanRequest $bookLoanRequest){
        $validatedData = $bookLoanRequest->validated();
        $validatedData['status']  = Auth::user()->role_id == '2' ? '1' : '0';
        $validatedData['loan_status']  = Auth::user()->role_id == '2' ? 'borrowed' : 'waiting';

        $book = Book::with(['category', 'enhancer'])->findOrFail($validatedData['book_id']);
        $book->decrement('quantity_total');

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

    public function process($id){
        $bookLoan = BookLoan::with(['borrower', 'book', 'enhancer'])->findOrFail(decrypt_id($id));

        return view('dashboard.book-loans.process', [
            'page_title' => 'Ubah Peminjam Buku',
            'bookLoan' => $bookLoan,
            'page' => 'book-loans',
        ]);
    }

    public function processAction(Request $request, $id, $action){
        $bookLoan = BookLoan::with(['borrower', 'book', 'enhancer'])->findOrFail(decrypt_id($id));
        $book = Book::findOrFail($bookLoan->book_id);

        if(!in_array($action, ['accept', 'reject'])){
            abort(404);
        }

        if(!($bookLoan->fine_amount > 0)){
            return response()->json([
                'message' => 'Denda keterlambatan wajib diisi.'
            ], 422); // atau 400 tergantung konteksnya
        }

        switch($action){
            case 'accept':
                $bookLoan->update([
                    'status' => '1',
                    'loan_status' => 'borrowed'
                ]);

                $book->decrement('quantity_total');
                break;
            case 'reject':
                $bookLoan->update([
                    'status' => '2',
                ]);
                break;
            default:
                abort(404);
        }

        return redirect()->route('dashboard.book.loans.index')->with('success-message', 'Berhasil memproses permohonan peminjaman buku.');

    }

    public function returning($id){
        try{
            $bookLoan = BookLoan::with(['book'])->findOrFail(decrypt_id($id));
            $bookLoan->book->increment('quantity_total');
            $bookLoan->update([
                'loan_status' => 'returned'
            ]);

            return redirect()->back()->with('success-status', 'Berhasil melakukan penerimaan buku.');
        }catch (\Exception $e) {
            return redirect()->back()->with('failed-status', 'Gagal melakukan penerimaan buku.');
        }
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
