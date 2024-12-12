<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoalMTKController extends Controller
{
    // Menampilkan halaman soal MTK
    public function index()
    {
        return view('soalMTK.index');
    }

    // API untuk menyediakan soal MTK
    public function getQuestions()
    {
        $questions = [
            [
                'id' => 1,
                'question' => "Nilai (0,5 + 0,6)^2 adalah ....",
                'options' => ["5121", "12,1", "1,21", "0,121", "0,0121"],
                'correctAnswer' => 2
            ],
            [
                'id' => 1,
                'question' => "Nilai 2 + 2 adalah ....",
                'options' => ["1", "2", "3", "4", "5"],
                'correctAnswer' => 3
            ],
        ];

        return response()->json($questions);
    }
}