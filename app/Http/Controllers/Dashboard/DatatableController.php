<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Role;
use App\Models\User;
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
                        return $bookCount. ' [<a href="'.route('dashboard.books.index', ['category' => encrypt_id($data->slug)]).'" class="blue-primary">Lihat</a>]';
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
                            $dropdown .= '<li><a href="javascript:void(0);" onclick="deleteItem(\''.$deleteUrl.'\', \'Apakah Anda yakin ingin menghapus pengguna '.$data->name.'? Akun pengguna dan data yang berhubungan dengannya juga akan dihapus secara permanen!\')"><em class="icon ni ni-trash"></em><span>Hapus</span></a></li>';

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

            $data = Book::with(['category'])->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('cover_image', function ($data) {
                    $url = $data->cover_image
                        ? asset('uploads/books/' . $data->cover_image)
                        : asset('assets/default/default.jpg');

                    return '<img src="' . $url . '" alt="Cover" style="width:50px; height:auto;">';
                })
                ->addColumn('category', function ($data) {
                    return $data->category->name;
                })
                ->addColumn('rating', function ($data) {
                    return 10;
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
