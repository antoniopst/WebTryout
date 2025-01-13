<?php

namespace App\Http\Controllers;

use App\Models\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        // Ambil semua data mata pelajaran
        $mapel = Mapel::all();
        
        // Kirim data ke view
        return view('soal', compact('mapel'));
    }
}