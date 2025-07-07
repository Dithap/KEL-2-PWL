<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DatatableController;
use App\Http\Controllers\Dashboard\OverviewController;

use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\BookCategoryController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

Route::view('/katalog', 'katalog.index')->name('katalog');
Route::view('/profil', 'user.profile')->name('profil');
Route::view('/buku-online', 'buku-online.index')->name('buku-online');
Route::view('/laporan', 'laporan.index')->name('laporan');
Route::view('/riwayat', 'riwayat.index')->name('riwayat');
Route::view('/ulasan', 'ulasan.index')->name('ulasan');
Route::view('/qrcode', 'qrcode.index')->name('qrcode');

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::controller(AuthController::class)->group(function(){
    Route::prefix('login')->group(function(){
        Route::get('/', 'login')->name('login');
        Route::post('/', 'loginAction')->name('login.action');
    });


    Route::prefix('register')->group(function(){
        Route::get('/', 'register')->name('register');
        Route::post('/', 'registerAction')->name('register.action');
    });

    Route::get('/logout', 'logout')->name('logout');
});

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){
    Route::get('/overview', [OverviewController::class, 'index'])->name('overview.index');

    Route::prefix('book-categories')->name('book.categories.')->group(function(){
        Route::controller(BookCategoryController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/show', 'show')->name('show');

            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');

            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');

            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::get('/data', [DatatableController::class, 'bookCategory'])->name('data');
    });

    Route::prefix('books')->name('books.')->group(function(){
        Route::controller(BookController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/show', 'show')->name('show');

            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');

            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');

            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::get('/data', [DatatableController::class, 'book'])->name('data');
    });

    Route::prefix('roles')->name('roles.')->group(function(){
        Route::controller(RoleController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/show', 'show')->name('show');

            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');

            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
        });

        Route::get('/data', [DatatableController::class, 'role'])->name('data');
    });

    Route::prefix('users')->name('users.')->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/show', 'show')->name('show');

            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');

            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');

            Route::delete('/{id}', 'destroy')->name('destroy');

            Route::get('/{id}/reset-password', 'resetPassword')->name('reset.password');
        });

        Route::get('/data', [DatatableController::class, 'user'])->name('data');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard.overview.index')->name('dashboard');
    Route::view('/katalog', 'katalog.index')->name('katalog');

    // Peminjaman routes
    Route::resource('peminjaman', PeminjamanController::class);
    Route::get('/pengembalian', [PeminjamanController::class, 'pengembalian'])->name('peminjaman.pengembalian');
    Route::post('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'prosesPengembalian'])->name('peminjaman.kembalikan');

    // Riwayat route
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

    // Tambahkan route lainnya di sini
});

Route::get('/scan-ktm', function() {
    return view('qrcode.scan');
})->name('qrcode.scan');

Route::get('/scan-ktm/cari', [App\Http\Controllers\QrcodeController::class, 'cari'])->name('qrcode.cari');
