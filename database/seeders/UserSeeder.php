<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Membuat pengguna dengan data dummy
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),  // Mengenkripsi password
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('userpassword'),  // Mengenkripsi password
            'role' => 'user',
        ]);

        // Menambahkan lebih banyak pengguna jika diperlukan
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('johndoepassword'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'password' => bcrypt('janedoe123'),
            'role' => 'user',
        ]);

        // Jika Anda ingin menggunakan factory untuk menambahkan pengguna lebih banyak
        // \App\Models\User::factory(10)->create(); 
    }
}
