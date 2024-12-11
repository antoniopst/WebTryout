<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TryoutController;

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/masuk', function () {
    return view('masuk');
});



// Rute untuk halaman beranda (root) yang menampilkan daftar tryout
Route::get('/', [TryoutController::class, 'index'])->name('tryout.index');

// Rute untuk daftar tryout
Route::get('/tryouts', [TryoutController::class, 'index'])->name('tryout.index');

// Rute untuk melihat detail tryout berdasarkan ID
Route::get('/tryouts/{id}', [TryoutController::class, 'show'])->name('tryout.show');

