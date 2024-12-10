<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;

class TestSeeder extends Seeder
{
    public function run()
    {
        Test::create([
            'title' => 'Matematika Dasar',
            'description' => 'Tes ini menguji pengetahuan dasar dalam matematika.',
            'duration' => 60,
        ]);
    }
}
