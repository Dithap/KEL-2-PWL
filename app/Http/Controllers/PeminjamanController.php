<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'page_title' => 'Daftar Peminjaman',
            'page' => 'peminjaman',
            'peminjaman' => $peminjaman
        ];

        return view('peminjaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'Tambah Peminjaman',
            'page' => 'peminjaman'
        ];

        return view('peminjaman.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:50',
            'tanggal_harus_kembali' => 'required|date|after:today',
            'catatan' => 'nullable|string'
        ]);

        Peminjaman::create([
            'user_id' => Auth::id(),
            'judul_buku' => $request->judul_buku,
            'kode_buku' => $request->kode_buku,
            'tanggal_pinjam' => now(),
            'tanggal_harus_kembali' => $request->tanggal_harus_kembali,
            'status' => 'dipinjam',
            'catatan' => $request->catatan
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peminjaman = Peminjaman::with('user')->findOrFail($id);
        
        $data = [
            'page_title' => 'Detail Peminjaman',
            'page' => 'peminjaman',
            'peminjaman' => $peminjaman
        ];

        return view('peminjaman.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        
        $data = [
            'page_title' => 'Edit Peminjaman',
            'page' => 'peminjaman',
            'peminjaman' => $peminjaman
        ];

        return view('peminjaman.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:50',
            'tanggal_harus_kembali' => 'required|date',
            'status' => 'required|in:dipinjam,dikembalikan,terlambat',
            'catatan' => 'nullable|string'
        ]);

        $peminjaman->update([
            'judul_buku' => $request->judul_buku,
            'kode_buku' => $request->kode_buku,
            'tanggal_harus_kembali' => $request->tanggal_harus_kembali,
            'status' => $request->status,
            'catatan' => $request->catatan
        ]);

        // Jika status diubah menjadi dikembalikan, set tanggal_kembali
        if ($request->status === 'dikembalikan' && !$peminjaman->tanggal_kembali) {
            $peminjaman->update(['tanggal_kembali' => now()]);
        }

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil dihapus!');
    }

    /**
     * Pengembalian buku
     */
    public function pengembalian()
    {
        $peminjaman = Peminjaman::with('user')
            ->where('status', 'dipinjam')
            ->orderBy('tanggal_harus_kembali', 'asc')
            ->get();

        $data = [
            'page_title' => 'Pengembalian Buku',
            'page' => 'pengembalian',
            'peminjaman' => $peminjaman
        ];

        return view('peminjaman.pengembalian', $data);
    }

    /**
     * Proses pengembalian buku
     */
    public function prosesPengembalian(Request $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        
        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now()
        ]);

        return redirect()->route('peminjaman.pengembalian')
            ->with('success', 'Buku berhasil dikembalikan!');
    }
}
