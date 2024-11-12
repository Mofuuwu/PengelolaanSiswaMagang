<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Rifqi',
            'status' => 'siswa',
            'email' => 'muhammadrifqi@gmail.com',
            'password' => bcrypt('Mengkudas11'),
            'role' => '1'
        ]);
        User::create([
            'name' => 'Rafif Dwi Saputra',
            'status' => 'siswa',
            'email' => 'rapipdw@gmail.com',
            'password' => bcrypt('Mengkudas11'),
            'role' => '3'
        ]);
    }
}
