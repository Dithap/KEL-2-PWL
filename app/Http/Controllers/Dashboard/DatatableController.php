<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookLoan;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DatatableController extends Controller
{
    public function bookCategory(Request $request){
        if ($request->ajax()) {

            $data = BookCategory::with(['books'])->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('book_count', function ($data) {
                    $bookCount =  $data->books->count();

                    if($bookCount > 0){
                        return $bookCount. ' [<a href="'.route('dashboard.books.index', ['category' => encrypt_id($data->id)]).'" class="blue-primary">Lihat</a>]';
                    }else{
                        return $bookCount;
                    }
                })
                ->addColumn('action', function ($data) {
                    $showUrl = route('dashboard.users.show', ['id' => encrypt_id($data->id)]);

                    $editUrl = route('dashboard.book.categories.edit', ['id' => encrypt_id($data->id)]);

                    $deleteUrl = route('dashboard.book.categories.destroy', ['id' => encrypt_id($data->id)]);

                    $dropdown = '<div class="dropdown" style="display:flex; justify-content:center;">
                                        <a class="dropdown-toggle btn btn-icon btn-light" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                        <div class="dropdown-menu dropdown-menu-datatable-custom dropdown-menu-end">
                                            <ul class="link-list-opt">
                                                <li><a href="'.$showUrl.'"><em class="icon ni ni-eye"></em><span>Detail</span></a></li>';

                        if (is_role(['2'])) {
                            $dropdown .= '<li><a href="'.$editUrl.'"><em class="icon ni ni-edit"></em><span>Ubah</span></a></li>';
                        }

                        if (is_role(['2'])) {
                            $dropdown .= '<li><a href="javascript:void(0);" onclick="deleteItem(\''.$deleteUrl.'\', \'Apakah Anda yakin ingin menghapus kategori buku '.$data->name.'?\')"><em class="icon ni ni-trash"></em><span>Hapus</span></a></li>';

                        }

                        $dropdown .= '</ul>
                                    </div>
                                </div>';

                        return $dropdown;
                })
                ->rawColumns(['book_count', 'action'])
                ->make(true);
        }

        return response()->json(['error' => 'Unauthorized'], 401);

    }

    public function book(Request $request){
        if ($request->ajax()) {

            $category = $request->input('category', null);

            $book = Book::with(['category']);

            if($category){
                $book->where('category_id', decrypt_id($category));
            }

            $data = $book->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category', function ($data) {
                    return $data->category->name;
                })
                ->addColumn('rating', function ($data) {
                    return 10;
                })
                ->addColumn('action', function ($data) {
                    $showUrl = route('dashboard.users.show', ['id' => encrypt_id($data->id)]);

                    $editUrl = route('dashboard.books.edit', ['id' => encrypt_id($data->id)]);

                    $deleteUrl = route('dashboard.books.destroy', ['id' => encrypt_id($data->id)]);

                    $dropdown = '<div class="dropdown" style="display:flex; justify-content:center;">
                                        <a class="dropdown-toggle btn btn-icon btn-light" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                        <div class="dropdown-menu dropdown-menu-datatable-custom dropdown-menu-end">
                                            <ul class="link-list-opt">
                                                <li><a href="'.$showUrl.'"><em class="icon ni ni-eye"></em><span>Detail</span></a></li>';

                        if (is_role(['2'])) {
                            $dropdown .= '<li><a href="'.$editUrl.'"><em class="icon ni ni-edit"></em><span>Ubah</span></a></li>';
                        }

                        if (is_role(['2'])) {
                            $dropdown .= '<li><a href="javascript:void(0);" onclick="deleteItem(\''.$deleteUrl.'\', \'Apakah Anda yakin ingin menghapus pengguna '.$data->name.'? Akun pengguna dan data yang berhubungan dengannya juga akan dihapus secara permanen!\')"><em class="icon ni ni-trash"></em><span>Hapus</span></a></li>';

                        }

                        $dropdown .= '</ul>
                                    </div>
                                </div>';

                        return $dropdown;
                })
                ->rawColumns(['cover_image', 'action'])
                ->make(true);
        }

        return response()->json(['error' => 'Unauthorized'], 401);

    }

    public function bookLoan(Request $request){
        if ($request->ajax()) {

            $data = BookLoan::with(['book', 'borrower','enhancer'])->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('borrower_name', function ($data) {
                    return $data->borrower->name;
                })
                ->addColumn('book_name', function ($data) {
                    return $data->book->title;
                })
                ->addColumn('loan_date', function ($data) {
                    return Carbon::parse($data->loan_date)->translatedFormat('l, d F Y');;
                })
                ->addColumn('due_date', function ($data) {
                    return Carbon::parse($data->loan_date)->translatedFormat('l, d F Y');;
                })
                ->addColumn('status', function ($data) {
                    switch($data->status){
                        case 0:
                            return '<span class="badge bg-warning" style="display:inline-block;font-size:0.8rem;">Menunggu</span>';
                        case 1:
                            return '<span class="badge bg-primary" style="display:inline-block;font-size:0.8rem;">Diterima</span>';
                        case 2:
                            return '<span class="badge bg-danger" style="display:inline-block;font-size:0.8rem;">Ditolak</span>';
                        default:
                            return '<span class="badge bg-secondary" style="display:inline-block;font-size:0.8rem;">Tidak Diketahui</span>';
                    }
                })
                ->addColumn('loan_status', function ($data) {
                    switch($data->loan_status){
                        case 'waiting':
                            return '<span class="badge bg-warning" style="display:inline-block;font-size:0.8rem;">Menunggu</span>';
                        case 'borrowed':
                            return '<span class="badge bg-primary" style="display:inline-block;font-size:0.8rem;">Masih Dipinjam</span>';
                        case 'returned':
                            return '<span class="badge bg-success" style="display:inline-block;font-size:0.8rem;">Sudah Dikembalikan</span>';
                        case 'late':
                            return '<span class="badge bg-danger" style="display:inline-block;font-size:0.8rem;">Terlambat Mengembalikan</span>';
                        default:
                            return '<span class="badge bg-secondary" style="display:inline-block;font-size:0.8rem;">Tidak Diketahui</span>';
                    }
                })
                ->addColumn('action', function ($data) {
                    $showUrl = route('dashboard.book.loans.show', ['id' => encrypt_id($data->id)]);

                    $editUrl = route('dashboard.book.loans.edit', ['id' => encrypt_id($data->id)]);

                    $processUrl = route('dashboard.book.loans.process', ['id' => encrypt_id($data->id)]);

                    $returningUrl = route('dashboard.book.loans.returning', ['id' => encrypt_id($data->id)]);

                    $deleteUrl = route('dashboard.book.loans.destroy', ['id' => encrypt_id($data->id)]);

                    $dropdown = '<div class="dropdown" style="display:flex; justify-content:center;">
                                        <a class="dropdown-toggle btn btn-icon btn-light" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                        <div class="dropdown-menu dropdown-menu-datatable-custom dropdown-menu-end">
                                            <ul class="link-list-opt">
                                                <li><a href="'.$showUrl.'"><em class="icon ni ni-eye"></em><span>Detail</span></a></li>';

                        if (is_role(['2'])) {
                            $dropdown .= '<li><a href="'.$editUrl.'"><em class="icon ni ni-edit"></em><span>Ubah</span></a></li>';
                        }

                        if (is_role(['2']) && $data->status == '0') {
                            $dropdown .= '<li><a href="'.$processUrl.'"><em class="icon ni ni-loader"></em><span>Proses</span></a></li>';
                        }
                        if (is_role(['2']) && in_array($data->status, ['1']) && in_array($data->loan_status, ['borrowed', 'late'])) {
                            $dropdown .= '<li><a href="'.$returningUrl.'"><em class="icon ni ni-check"></em><span>Sudah Dikembalikan</span></a></li>';
                        }

                        if (is_role(['2'])) {
                            $dropdown .= '<li><a href="javascript:void(0);" onclick="deleteItem(\''.$deleteUrl.'\', \'Apakah Anda yakin ingin menghapus peminjaman buku '.$data->book->title.' oleh '.$data->borrower->name.'?\')"><em class="icon ni ni-trash"></em><span>Hapus</span></a></li>';

                        }

                        $dropdown .= '</ul>
                                    </div>
                                </div>';

                        return $dropdown;
                })
                ->rawColumns(['status', 'loan_status','action'])
                ->make(true);
        }

        return response()->json(['error' => 'Unauthorized'], 401);

    }

    public function role(Request $request){
        if ($request->ajax()) {

            $data = Role::with(['users'])->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('account_count', function ($data) {
                    $accountCount =  $data->users->count();

                    if($accountCount > 0){
                        return $accountCount. ' [<a href="'.route('dashboard.users.index', ['role' => encrypt_id($data->id)]).'" class="blue-primary">Lihat</a>]';
                    }else{
                        return $accountCount;
                    }
                })
                ->rawColumns(['account_count', 'action'])
                ->make(true);
        }

        return response()->json(['error' => 'Unauthorized'], 401);

    }

    public function user(Request $request){
        if ($request->ajax()) {

            $name = $request->input('name', null);
            $role = $request->input('role', null);
            $status = $request->input('status', null);

            $query = User::with(['role']);

            if($role){
                $query->where('name', 'LIKE', '%'.$name.'%');
            }

            if($role && $role !== 'all'){
                $query->where('role_id', '=', decrypt_id($role));
            }

            if($status && $status !== 'all'){
                $query->where('status', '=', $status);
            }

            $query->whereNot('id', '=', Auth::id());

            $data = $query->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function ($data){
                    return $data->role->name;
                })
                ->addColumn('status', function ($data){
                    switch($data->status){
                        case '0':
                            return '<span class="badge bg-danger" style="display:inline-block;font-size:0.8rem;">Tidak Diketahui</span>';
                        case '1':
                            return '<span class="badge blue-badge" style="display:inline-block;font-size:0.8rem;">Aktif</span>';
                        default:
                            return '<span class="badge bg-secondary" style="display:inline-block;font-size:0.8rem;">Tidak Diketahui</span>';

                    }
                })
                ->addColumn('action', function ($data) {
                    $showUrl = route('dashboard.users.show', ['id' => encrypt_id($data->id)]);

                    $resetPasswordUrl = route('dashboard.users.reset.password', ['id' => encrypt_id($data->id)]);

                    $editUrl = route('dashboard.users.edit', ['id' => encrypt_id($data->id)]);

                    $deleteUrl = route('dashboard.users.destroy', ['id' => encrypt_id($data->id)]);

                    $dropdown = '<div class="dropdown" style="display:flex; justify-content:center;">
                                        <a class="dropdown-toggle btn btn-icon btn-light" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                        <div class="dropdown-menu dropdown-menu-datatable-custom dropdown-menu-end">
                                            <ul class="link-list-opt">
                                                <li><a href="'.$showUrl.'"><em class="icon ni ni-eye"></em><span>Detail</span></a></li>';

                        if (is_role(['2'])) {
                            $dropdown .= '<li><a href="'.$resetPasswordUrl.'"><em class="icon ni ni-lock"></em><span>Reset Password</span></a></li>';
                        }

                        if (is_role(['2'])) {
                            $dropdown .= '<li><a href="'.$editUrl.'"><em class="icon ni ni-edit"></em><span>Ubah</span></a></li>';
                        }

                        if (is_role(['2'])) {
                            $dropdown .= '<li><a href="javascript:void(0);" onclick="deleteItem(\''.$deleteUrl.'\', \'Apakah Anda yakin ingin menghapus pengguna '.$data->name.'? Akun pengguna dan data yang berhubungan dengannya juga akan dihapus secara permanen!\')"><em class="icon ni ni-trash"></em><span>Hapus</span></a></li>';

                        }

                        $dropdown .= '</ul>
                                    </div>
                                </div>';

                        return $dropdown;
                })

                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return response()->json(['error' => 'Unauthorized'], 401);

    }
}
