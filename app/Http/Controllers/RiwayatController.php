<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Peminjaman::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'page_title' => 'Riwayat Peminjaman & Pengembalian',
            'page' => 'riwayat',
            'riwayat' => $riwayat
        ];

        return view('riwayat.index', $data);
    }
}
