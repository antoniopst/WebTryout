<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Soal;
use App\Models\Kategori; // Pastikan model Kategori di-import
use Illuminate\Http\Request;

class AdminSoalController extends Controller
{
    // Fungsi untuk menampilkan halaman daftar soal
    public function index()
    {
        // Ambil semua data soal dengan relasi ke tabel mapel
        $soal = Soal::with('mapel')
                    ->orderBy('mapel_id') // Urutkan berdasarkan mapel_id
                    ->get();
        
        // Kirim data ke view
        return view('admin.soal.index', compact('soal'));
    }

    // Fungsi untuk menampilkan form tambah soal
    public function create()
    {
        $mapel = Mapel::all();
        $kategori = Kategori::with('mapel')->get(); // Ambil semua kategori beserta relasi mapel

        if ($mapel->isEmpty()) {
            return redirect()->route('admin.soal.index')->with('error', 'Mata Pelajaran tidak ditemukan');
        }

        return view('admin.soal.create', compact('mapel', 'kategori'));
    }

    // Fungsi untuk menyimpan soal baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mapel_id' => 'required|exists:mapel,id',
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori
            'question' => 'required|string|max:1000', 
            'options' => 'required|array|min:4|max:4', 
            'correct_answer' => 'required|integer|min:1|max:4', // Indeks 1-based dari form
        ]);

        // Konversi array options ke JSON
        $options = json_encode($request->options);

        // Simpan soal baru dengan penyesuaian correct_answer
        Soal::create([
            'mapel_id' => $request->mapel_id,
            'kategori_id' => $request->kategori_id, // Menyimpan kategori
            'question' => $request->question,
            'options' => $options,
            'correct_answer' => $request->correct_answer - 1, // Penyesuaian ke 0-based
        ]);

        // Redirect ke halaman daftar soal dengan pesan sukses
        return redirect()->route('admin.soal.index')->with('success', 'Soal berhasil ditambahkan');
    }

    // Fungsi untuk menampilkan form edit soal
    public function edit($id)
    {
        $soal = Soal::findOrFail($id);
        $mapel = Mapel::all();
        $kategori = Kategori::with('mapel')->get(); // Ambil semua kategori beserta relasi mapel

        return view('admin.soal.edit', compact('soal', 'mapel', 'kategori'));
    }

    // Fungsi untuk memperbarui data soal
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'question' => 'required|string',
            'options.*' => 'required|string',
            'correct_answer' => 'required|integer|in:1,2,3,4', // Angka 1-4 untuk pilihan
            'kategori_id' => 'required|exists:kategori,id', // Memastikan kategori valid
        ]);

        // Cari soal berdasarkan ID
        $soal = Soal::findOrFail($id);

        // Update data soal
        $soal->question = $request->question;
        $soal->options = json_encode($request->options); // Simpan pilihan sebagai JSON
        $soal->correct_answer = $request->correct_answer - 1; // Adjust untuk array 0-based
        $soal->kategori_id = $request->kategori_id;

        // Simpan perubahan
        $soal->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.soal.index')->with('success', 'Soal berhasil diperbarui.');
    }

    // Fungsi untuk menghapus soal
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect()->route('admin.soal.index')->with('success', 'Soal berhasil dihapus');
    }
}