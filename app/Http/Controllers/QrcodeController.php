<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class QrcodeController extends Controller
{
    public function cari(Request $request)
    {
        $nim = $request->input('nim');
        $user = User::where('nim', $nim)->first();
        return view('qrcode.result', [
            'user' => $user,
            'nim' => $nim
        ]);
    }
}
