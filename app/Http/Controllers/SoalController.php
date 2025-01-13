<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Soal;

class SoalController extends Controller
{
    // Menampilkan halaman soal berdasarkan mata pelajaran
    public function index($mataPelajaran)
    {
        // Ambil data mata pelajaran dari database berdasarkan slug
        $mapel = Mapel::where('slug', $mataPelajaran)->first();

        // Validasi jika mata pelajaran tidak ditemukan
        if (!$mapel) {
            abort(404, 'Mata pelajaran tidak ditemukan.');
        }

        // Kirim data ke view
        $title = $mapel->nama_mapel; // Sesuaikan dengan kolom 'nama_mapel' di tabel
        return view('soal.index', compact('mataPelajaran', 'title'));
    }

    // API untuk menyediakan soal berdasarkan mata pelajaran
    public function getQuestions($mataPelajaran)
    {
        // Ambil data mata pelajaran dari database berdasarkan slug
        $mapel = Mapel::where('slug', $mataPelajaran)->first();

        // Validasi jika mata pelajaran tidak ditemukan
        if (!$mapel) {
            abort(404, 'Mata pelajaran tidak ditemukan.');
        }

        // Ambil soal-soal yang terkait dengan mata pelajaran beserta relasi kategori
        $questions = Soal::with(['kategori']) // Memuat relasi kategori
            ->where('mapel_id', $mapel->id)
            ->get()
            ->shuffle(); // Mengacak urutan soal

        // Format ulang data soal untuk dikirim sebagai JSON
        $formattedQuestions = $questions->map(function ($question) {
            return [
                'id' => $question->id,
                'question' => $question->question,
                'options' => json_decode($question->options, true),
                'correctAnswer' => $question->correct_answer,
                'kategori' => $question->kategori->nama_kategori ?? 'Tidak ada kategori', // Menambahkan nama kategori
            ];
        });

        return response()->json($formattedQuestions);
    }
}