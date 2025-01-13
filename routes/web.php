<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\AdminMapelController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminSoalController;
use App\Http\Controllers\AdminUserController;

// Authentication Routes
Route::get('/masuk', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/masuk', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Mapel Routes
    Route::prefix('admin/mapel')->group(function () {
        Route::get('/', [AdminMapelController::class, 'index'])->name('admin.mapel.index');
        Route::get('/create', [AdminMapelController::class, 'create'])->name('admin.mapel.create');
        Route::post('/store', [AdminMapelController::class, 'store'])->name('admin.mapel.store');
        Route::get('/edit/{id}', [AdminMapelController::class, 'edit'])->name('admin.mapel.edit');
        Route::post('/update/{id}', [AdminMapelController::class, 'update'])->name('admin.mapel.update');
        Route::post('/delete/{id}', [AdminMapelController::class, 'destroy'])->name('admin.mapel.delete');
    });

    // Kategori Routes
    Route::prefix('admin/kategori')->group(function () {
        Route::get('/', [AdminKategoriController::class, 'index'])->name('admin.kategori.index');
        Route::get('/create', [AdminKategoriController::class, 'create'])->name('admin.kategori.create');
        Route::post('/store', [AdminKategoriController::class, 'store'])->name('admin.kategori.store');
        Route::get('/edit/{id}', [AdminKategoriController::class, 'edit'])->name('admin.kategori.edit');
        Route::put('/update/{id}', [AdminKategoriController::class, 'update'])->name('admin.kategori.update');
        Route::post('/delete/{id}', [AdminKategoriController::class, 'destroy'])->name('admin.kategori.delete');
    });


    // Soal Routes
    Route::prefix('admin/soal')->group(function () {
        Route::get('/', [AdminSoalController::class, 'index'])->name('admin.soal.index');
        Route::get('/create', [AdminSoalController::class, 'create'])->name('admin.soal.create');
        Route::post('/store', [AdminSoalController::class, 'store'])->name('admin.soal.store');
        Route::get('/edit/{id}', [AdminSoalController::class, 'edit'])->name('admin.soal.edit');
        Route::put('/update/{id}', [AdminSoalController::class, 'update'])->name('admin.soal.update');
        Route::post('/delete/{id}', [AdminSoalController::class, 'destroy'])->name('admin.soal.delete');
    });

    // User Routes
    Route::prefix('admin/users')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::post('/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.delete');
    });
});

// Registration Routes
Route::get('/daftar', function () {
    return view('daftar');
});
Route::post('/daftar', [AuthController::class, 'register'])->name('register');

// Home Routes
Route::get('/', function () {
    return view('beranda');
});

// Soal Routes (Protected by auth middleware)
Route::middleware('auth')->group(function () {
    // Halaman Pilihan Mata Pelajaran
    Route::get('/soal', [MapelController::class, 'index'])->name('soal.index');  // Menggunakan MapelController

    // Menampilkan Soal Berdasarkan Mata Pelajaran
    Route::get('/soal/{mataPelajaran}', [SoalController::class, 'index'])
        ->name('soal.show');

    // API untuk Mengambil Data Soal
    Route::get('/soal/{mataPelajaran}/questions', [SoalController::class, 'getQuestions'])
        ->name('soal.questions');
});

// About Page
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');