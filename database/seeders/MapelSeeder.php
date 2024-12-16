<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mapel')->insert([
            ['nama_mapel' => 'matematika', 'created_at' => now(), 'updated_at' => now()],
            ['nama_mapel' => 'bahasa-indonesia', 'created_at' => now(), 'updated_at' => now()],
            ['nama_mapel' => 'bahasa-inggris', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}