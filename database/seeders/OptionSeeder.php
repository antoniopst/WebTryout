<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan data opsi
        Option::create([
            'question_id' => 1,
            'option_text' => '4',
            'is_correct' => true,
        ]);
        
        Option::create([
            'question_id' => 1,
            'option_text' => '5',
            'is_correct' => false,
        ]);
    }
}
