<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('soal')->insert([
            [
                'mapel_id' => 1, // ID untuk 'matematika'
                'question' => 'Nilai (0,5 + 0,6)^2 adalah ....',
                'options' => json_encode(["5121", "12,1", "1,21", "0,121", "0,0121"]),
                'correct_answer' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mapel_id' => 2, // ID untuk 'bahasa-indonesia'
                'question' => "Antonim dari 'besar' adalah ....",
                'options' => json_encode(["Kecil", "Tinggi", "Lebar", "Pendek"]),
                'correct_answer' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mapel_id' => 3, // ID untuk 'bahasa-inggris'
                'question' => "What is the past tense of 'go'?",
                'options' => json_encode(["Gone", "Went", "Going", "Goes"]),
                'correct_answer' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}