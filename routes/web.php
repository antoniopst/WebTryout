<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\SoalMTKController;

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/masuk', function () {
    return view('masuk');
});

Route::get('/', function () {
    return view('beranda');
});

Route::get('/soal', function () {
    return view('soal');
});

Route::get('/soal-mtk', [SoalMTKController::class, 'index']);
Route::get('/soal-mtk/questions', [SoalMTKController::class, 'getQuestions']);


// Rute untuk halaman beranda (root) yang menampilkan daftar tryout
Route::get('/try', [TryoutController::class, 'index'])->name('tryout.index');

// Rute untuk daftar tryout
Route::get('/tryouts', [TryoutController::class, 'index'])->name('tryout.index');

// Rute untuk melihat detail tryout berdasarkan ID
Route::get('/tryouts/{id}', [TryoutController::class, 'show'])->name('tryout.show');

Route::get('/tentang', function () {
    return view('tentang');
});
