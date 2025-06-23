<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\OverviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
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
});
