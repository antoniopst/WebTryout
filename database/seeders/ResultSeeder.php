<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Result;

class ResultSeeder extends Seeder
{
    public function run()
    {
        Result::create([
            'user_id' => 1,
            'test_id' => 1,
            'score' => 85.50,
        ]);
    }
}
