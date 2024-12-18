<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Soal;
use Illuminate\Support\Facades\Auth;

class SoalController extends Controller
{
    // Menampilkan daftar soal untuk pengguna umum berdasarkan mata pelajaran
    public function index($mataPelajaran)
    {
        $mapel = Mapel::where('slug', $mataPelajaran)->firstOrFail();
        $questions = $mapel->soals()->paginate(10); // pagination

        return view('soal.index', [
            'questions' => $questions,
            'mapel' => $mapel,
        ]);
    }

    // API untuk menyediakan soal berdasarkan mata pelajaran
    public function getQuestions($mataPelajaran)
    {
        $mapel = Mapel::where('slug', $mataPelajaran)->firstOrFail();
        $questions = $mapel->soals()->paginate(10); // pagination

        $formattedQuestions = $questions->map(function ($question) {
            return [
                'id' => $question->id,
                'question' => $question->question,
                'options' => json_decode($question->options, true),
                'correctAnswer' => $question->correct_answer,
                'mapel' => $question->mapel->name,
            ];
        });

        return response()->json($formattedQuestions);
    }

    // Menampilkan daftar soal untuk admin
    public function admin()
    {
        // Ambil semua soal dari database
        $soals = Soal::with('mapel')->paginate(10); // Gunakan pagination untuk admin

        return view('admin.soal.index', compact('soals'));
    }

    // Menampilkan form untuk menambah soal
    public function create()
    {
        $mapels = Mapel::all();
        return view('admin.soal.create', compact('mapels'));
    }

    // Menyimpan soal baru
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'options' => 'required|json',
            'correct_answer' => 'required|integer|min:0',
            'mapel_id' => 'required|exists:mapels,id', // Validasi untuk mapel_id
        ]);

        // Membuat soal baru
        Soal::create([
            'question' => $request->input('question'),
            'options' => $request->input('options'),
            'correct_answer' => $request->input('correct_answer'),
            'mapel_id' => $request->input('mapel_id'), // Menyimpan mapel_id
        ]);

        return redirect()->route('admin.soal.index')->with('success', 'Soal berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit soal
    public function edit($id)
    {
        $soal = Soal::with('mapel')->findOrFail($id);
        $mapels = Mapel::all(); // Ambil semua mata pelajaran
        return view('admin.soal.edit', compact('soal', 'mapels'));
    }

    // Memperbarui soal
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'options' => 'required|json',
            'correct_answer' => 'required|integer|min:0',
            'mapel_id' => 'required|exists:mapels,id', // Validasi untuk mapel_id
        ]);

        $soal = Soal::findOrFail($id);
        $soal->update([
            'question' => $request->input('question'),
            'options' => $request->input('options'),
            'correct_answer' => $request->input('correct_answer'),
            'mapel_id' => $request->input('mapel_id'), // Menyimpan mapel_id
        ]);

        return redirect()->route('admin.soal.index')->with('success', 'Soal berhasil diperbarui.');
    }

    // Menghapus soal
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect()->route('admin.soal.index')->with('success', 'Soal berhasil dihapus.');
    }
}
