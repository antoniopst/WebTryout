<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    // Menampilkan daftar mapel
    public function index()
    {
        $mapels = Mapel::paginate(10);
        return view('admin.mapel.index', compact('mapels'));
    }

    // Menampilkan form tambah mapel
    public function create()
    {
        return view('admin.mapel.create');
    }

    // Menyimpan mapel baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:mapels',
        ]);

        Mapel::create($request->only('name', 'slug'));
        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil ditambahkan.');
    }

    // Menampilkan form edit mapel
    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('admin.mapel.edit', compact('mapel'));
    }

    // Memperbarui mapel
    public function update(Request $request, $id)
    {
        $mapel = Mapel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:mapels,slug,' . $mapel->id,
        ]);

        $mapel->update($request->only('name', 'slug'));
        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil diperbarui.');
    }

    // Menghapus mapel
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil dihapus.');
    }
}
