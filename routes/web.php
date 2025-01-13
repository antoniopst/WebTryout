<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Authentication Routes
Route::get('/masuk', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/masuk', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    
    // Rute untuk melihat user
    Route::get('/admin/users', [AdminController::class, 'indexUsers'])->name('admin.users.index');

    // Rute untuk mengelola soal
    Route::get('/admin/soal', [AdminController::class, 'indexSoal'])->name('admin.soal.index');
    Route::get('/admin/soal/create', [AdminController::class, 'createSoal'])->name('admin.soal.create');
    Route::post('/admin/soal', [AdminController::class, 'storeSoal'])->name('admin.soal.store');
    Route::get('/admin/soal/{id}/edit', [AdminController::class, 'editSoal'])->name('admin.soal.edit');
    Route::put('/admin/soal/{id}', [AdminController::class, 'updateSoal'])->name('admin.soal.update');
    Route::delete('/admin/soal/{id}', [AdminController::class, 'deleteSoal'])->name('admin.soal.delete');
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
    Route::get('/soal', function () {
        return view('soal');
    })->name('soal.index');

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

