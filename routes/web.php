<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin'); // Pastikan file blade-nya ada
    })->middleware('UserAkses:admin')->name('admin'); // Tambahkan name

    Route::get('/Dashboard', function () {
        return view('Dashboard'); // Pastikan file blade-nya ada
    })->middleware('UserAkses:petugas')->name('Dashboard'); // Tambahkan name

    Route::get('/', function () {
        return view('home'); // Pastikan file blade-nya ada
    })->middleware('UserAkses:user')->name('home'); // Tambahkan name
    

    Route::get('/logout', [SesiController::class, 'logout']);
});

// Route::get('/home', function () {
//     return view('home'); // Sesuaikan dengan halaman yang ada
// })->name('home');


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
