<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TestSeeder::class,
            QuestionSeeder::class,
            OptionSeeder::class,
            ResultSeeder::class,
            AnswerSeeder::class,
        ]);
    }
}
