<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\OverviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::prefix('dashboard')->name('dashboard.')->group(function(){
    Route::get('/overview', [OverviewController::class, 'index'])->name('overview.index');
});
