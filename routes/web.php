<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==============================
// ROUTE UNTUK GUEST (belum login)
// ==============================
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);

    Route::get('/register', [SesiController::class, 'register'])->name('register');
    Route::post('/register', [SesiController::class, 'registerAction'])->name('register.action');
});

// ==============================
// ROUTE UNTUK USER YANG SUDAH LOGIN
// ==============================
Route::middleware(['auth'])->group(function () {

    // ==============================
    // ROUTE UNTUK ADMIN
    // ==============================
    Route::middleware('UserAkses:admin')->prefix('admin')->name('admin.')->group(function () {

        // Dashboard Admin
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        // Update status pendaftaran siswa
        Route::post('/update-status/{id}', [AdminController::class, 'updateStatus'])->name('updateStatus');

        // Daftar semua user
        Route::get('/users', [AdminController::class, 'listUsers'])->name('users');

        // Daftar semua siswa
        Route::get('/siswa', [AdminController::class, 'listSiswa'])->name('siswa.index');

        // Menampilkan detail siswa berdasarkan ID
        Route::get('/siswa/{id}', [AdminController::class, 'showSiswa'])->name('siswa.show');
    });

    // ==============================
    // ROUTE UNTUK USER (ROLE USER)
    // ==============================
    Route::middleware('UserAkses:user')->group(function () {

        // Dashboard User
        Route::get('/', function () {
            return view('home');
        })->name('home');

        // Formulir Pendaftaran
        Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');

        // Simpan data pendaftaran
        Route::post('/', [SiswaController::class, 'store'])->name('siswa.store');
    });

    // ==============================
    // ROUTE UNTUK SEMUA YANG SUDAH LOGIN
    // ==============================

    // Halaman profil user
    Route::get('/profile', [SiswaController::class, 'showProfile'])->name('profile');

    // Form cek status pendaftaran berdasarkan NISN
    Route::get('/status', [SiswaController::class, 'showForm'])->name('status.form');
    Route::post('/status', [SiswaController::class, 'searchByNISN'])->name('status.searchByNISN');

    // Logout
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});

// ==============================
// ROUTE TAMBAHAN LAIN (JIKA DIPERLUKAN)
// ==============================

Route::get('/status', [StatusController::class, 'index'])->middleware('auth')->name('status');

// Import route tambahan jika ada
require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
