<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class AdminMapelController extends Controller
{
    // Fungsi untuk menampilkan halaman daftar mata pelajaran
    public function index()
    {
        // Ambil semua data mata pelajaran
        $mapel = Mapel::all();
        
        // Kirim data ke view
        return view('admin.mapel.index', compact('mapel'));
    }

    // Fungsi untuk menampilkan form tambah mata pelajaran
    public function create()
    {
        return view('admin.mapel.create');
    }

    // Fungsi untuk menyimpan mata pelajaran baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
        ]);

        // Simpan mata pelajaran baru
        Mapel::create([
            'nama_mapel' => $request->nama_mapel,
        ]);

        // Redirect ke halaman daftar mata pelajaran dengan pesan sukses
        return redirect()->route('admin.mapel.index')->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }

    // Fungsi untuk menampilkan form edit mata pelajaran
    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('admin.mapel.edit', compact('mapel'));
    }

    // Fungsi untuk memperbarui data mata pelajaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update([
            'nama_mapel' => $request->nama_mapel,
        ]);

        return redirect()->route('admin.mapel.index')->with('success', 'Mata Pelajaran berhasil diperbarui');
    }

    // Fungsi untuk menghapus mata pelajaran
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('admin.mapel.index')->with('success', 'Mata Pelajaran berhasil dihapus');
    }
}