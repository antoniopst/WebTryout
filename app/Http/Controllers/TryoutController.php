<?php

namespace App\Http\Controllers;

use App\Models\Test; // Pastikan Anda menggunakan model Test
use Illuminate\Http\Request;

class TryoutController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel tests
        $tests = Test::all();

        // Mengirim data 'tests' ke view 'index'
        return view('index', compact('tests'));
    }

    public function show($id)
    {
        // Menampilkan detail tryout berdasarkan ID
        $test = Test::findOrFail($id);
        return view('tryout.show', compact('test'));
    }
}
