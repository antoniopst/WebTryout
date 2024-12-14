<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoalController extends Controller
{
    // Menampilkan halaman soal berdasarkan mata pelajaran
    public function index($mataPelajaran)
    {
        $validSubjects = ['matematika', 'bahasa-indonesia', 'bahasa-inggris'];

        // Validasi mata pelajaran
        if (!in_array($mataPelajaran, $validSubjects)) {
            abort(404, 'Mata pelajaran tidak ditemukan.');
        }

        $title = ucfirst(str_replace('-', ' ', $mataPelajaran));
        return view('soal.index', compact('mataPelajaran', 'title'));
    }

    // API untuk menyediakan soal berdasarkan mata pelajaran
    public function getQuestions($mataPelajaran)
    {
        $questionsBank = [
            'matematika' => [
                [
                    'id' => 1,
                    'question' => "Nilai (0,5 + 0,6)^2 adalah ....",
                    'options' => ["5121", "12,1", "1,21", "0,121", "0,0121"],
                    'correctAnswer' => 2
                ],
                [
                    'id' => 2,
                    'question' => "Nilai 2 + 2 adalah ....",
                    'options' => ["1", "2", "3", "4", "5"],
                    'correctAnswer' => 3
                ],
            ],
            'bahasa-indonesia' => [
                [
                    'id' => 1,
                    'question' => "Antonim dari 'besar' adalah ....",
                    'options' => ["Kecil", "Tinggi", "Lebar", "Pendek"],
                    'correctAnswer' => 0
                ],
                [
                    'id' => 2,
                    'question' => "Sinonim dari 'cerdas' adalah ....",
                    'options' => ["Bodoh", "Pintar", "Malas", "Pelupa"],
                    'correctAnswer' => 1
                ],
            ],
            'bahasa-inggris' => [
                [
                    'id' => 1,
                    'question' => "What is the past tense of 'go'?",
                    'options' => ["Gone", "Went", "Going", "Goes"],
                    'correctAnswer' => 1
                ],
                [
                    'id' => 2,
                    'question' => "Which one is a fruit?",
                    'options' => ["Apple", "Table", "Chair", "Window"],
                    'correctAnswer' => 0
                ],
            ],
        ];

        if (!isset($questionsBank[$mataPelajaran])) {
            abort(404, 'Soal tidak ditemukan untuk mata pelajaran ini.');
        }

        return response()->json($questionsBank[$mataPelajaran]);
    }
}