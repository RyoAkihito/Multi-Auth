<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AdminController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);

    Route::get('/register', [SesiController::class, 'register'])->name('register');
    Route::post('/register', [SesiController::class, 'registerAction'])->name('register.action');
});

// ✅ Rute status hanya arahkan ke StatusController
Route::middleware(['auth'])->get('/status', [StatusController::class, 'index'])->name('status');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->middleware('UserAkses:admin')->name('admin');

    Route::get('/', function () {
        return view('home');
    })->middleware('UserAkses:user')->name('home');

    Route::post('/', [SiswaController::class, 'store'])->middleware('UserAkses:user')->name('siswa.store');

    // ❌ HAPUS atau KOMENTARI ini jika tidak ada index() di SiswaController
    // Route::get('/status', [SiswaController::class, 'index']);

    Route::get('/logout', [SesiController::class, 'logout']);
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
