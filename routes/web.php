<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MapelController;


// Authentication Routes
Route::get('/masuk', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/masuk', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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


// Group route admin yang dilindungi
Route::middleware(['auth'])->group(function () {
    // Route untuk halaman Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Route untuk kelola user
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    
    // Route untuk memperbarui user
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');

    // Route untuk menghapus user
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
});

// Admin Routes for Soal
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/soal', [SoalController::class, 'admin'])->name('admin.soal.index');
    Route::get('/soal/create', [SoalController::class, 'create'])->name('admin.soal.create');
    Route::post('/soal', [SoalController::class, 'store'])->name('admin.soal.store');
    Route::get('/soal/{id}/edit', [SoalController::class, 'edit'])->name('admin.soal.edit');
    Route::put('/soal/{id}', [SoalController::class, 'update'])->name('admin.soal.update');
    Route::delete('/soal/{id}', [SoalController::class, 'destroy'])->name('admin.soal.destroy');
});

// Admin Routes for Mapel
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Route untuk menampilkan daftar mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('admin.mapel.index');

    // Route untuk menampilkan form tambah mapel
    Route::get('/mapel/create', [MapelController::class, 'create'])->name('admin.mapel.create');

    // Route untuk menyimpan mapel baru
    Route::post('/mapel', [MapelController::class, 'store'])->name('admin.mapel.store');

    // Route untuk menampilkan form edit mapel
    Route::get('/mapel/{id}/edit', [MapelController::class, 'edit'])->name('admin.mapel.edit');

    // Route untuk memperbarui mapel
    Route::put('/mapel/{id}', [MapelController::class, 'update'])->name('admin.mapel.update');

    // Route untuk menghapus mapel
    Route::delete('/mapel/{id}', [MapelController::class, 'destroy'])->name('admin.mapel.destroy');
});
