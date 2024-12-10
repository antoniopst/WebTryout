<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Test;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan tes pertama
        $test = Test::first();

        // Menambahkan soal untuk tes pertama
        Question::create([
            'test_id' => $test->id,
            'question_text' => 'Apa hasil dari 2 + 2?',
        ]);
    }
}
