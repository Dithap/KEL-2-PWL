<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        return view('dashboard.users.index', [
            'page_title' => 'Pengguna',
            'page' => 'users',
            'roles' => Role::all(),
            'name' => $request->input('name', null),
            'role' => $request->input('role', null),
            'status' => $request->input('status', null),
        ]);
    }

    public function create(){
        return view('dashboard.users.create', [
            'page_title' => 'Tambah Pengguna',
            'page' => 'users',
            'roles' => Role::all(),
        ]);
    }

    public function store(UserRequest $userRequest){
        $validatedData = $userRequest->validated();
        $validatedData['status'] = '1';

        User::create($validatedData);

        return redirect()->route('dashboard.users.index')->with('success-message', 'Berhasil menambahkan pengguna');
    }

    public function edit($id){
        $user = User::with(['role'])->findOrFail(decrypt_id($id));

        return view('dashboard.users.edit', [
            'page_title' => 'Ubah Pengguna',
            'page' => 'users',
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(UserRequest $userRequest, $id){
        $validatedData = $userRequest->validated();

        $user = User::with(['role'])->findOrFail(decrypt_id($id));

        $user->update($validatedData);
        return redirect()->route('dashboard.users.show', ['id' => $id])->with('success-message', 'Berhasil mengubah pengguna');
    }

    public function show($id){
        $user = User::with(['role'])->findOrFail(decrypt_id($id));

        return view('dashboard.users.show', [
            'page_title' => 'Detail Pengguna',
            'page' => 'users',
            'user' => $user
        ]);
    }

    public function destroy($id){
        try{
            $user = User::findOrFail(decrypt_id($id));
            $user->delete();

            return response()->json(['message' => 'Berhasil menghapus pengguna.']);
        }catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus pengguna.'], 500);
        }
    }
}
