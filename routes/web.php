<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\OverviewController;
use Illuminate\Support\Facades\Route;

Route::view('/katalog', 'katalog.index')->name('katalog');
Route::view('/peminjaman', 'peminjaman.index')->name('peminjaman');
Route::view('/pengembalian', 'peminjaman.pengembalian')->name('pengembalian');
Route::view('/profil', 'user.profile')->name('profil');
Route::view('/buku-online', 'buku-online.index')->name('buku-online');
Route::view('/laporan', 'laporan.index')->name('laporan');
Route::view('/riwayat', 'riwayat.index')->name('riwayat');
Route::view('/ulasan', 'ulasan.index')->name('ulasan');
Route::view('/qrcode', 'qrcode.index')->name('qrcode');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::prefix('dashboard')->name('dashboard.')->group(function(){
    Route::get('/overview', [OverviewController::class, 'index'])->name('overview.index');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard.overview.index')->name('dashboard');
    Route::view('/katalog', 'katalog.index')->name('katalog');
    // Tambahkan route lainnya di sini
});