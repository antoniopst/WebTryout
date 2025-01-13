<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Mapel; // Pastikan Mapel juga diimport
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        // Mengambil kategori beserta relasi ke tabel mapel dan urutkan berdasarkan nama_mapel
        $kategori = Kategori::join('mapel', 'kategori.mapel_id', '=', 'mapel.id')
                            ->select('kategori.*', 'mapel.nama_mapel')
                            ->orderBy('mapel.nama_mapel', 'asc')  // Urutkan berdasarkan nama_mapel
                            ->get();

        return view('admin.kategori.index', compact('kategori'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        $mapel = Mapel::all(); // Mengambil semua data mapel
        return view('admin.kategori.create', compact('mapel')); // Kirim data mapel ke form
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'mapel_id' => 'required|exists:mapel,id', // Validasi mapel_id
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'mapel_id' => $request->mapel_id, // Menyimpan mapel_id
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        $mapel = Mapel::all(); // Mengambil semua data mapel untuk pilihan
        return view('admin.kategori.edit', compact('kategori', 'mapel'));
    }

    // Memperbarui kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'mapel_id' => 'required|exists:mapel,id',
            'nama_kategori' => 'required|string|max:255',
        ]);

        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->mapel_id = $request->mapel_id;
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();

            return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}