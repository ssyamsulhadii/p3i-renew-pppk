<?php

namespace Database\Seeders;

use App\Models\MasaPerpanjangan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin_p3i',
            'password' => '$2y$12$Bgu5g5.4CX6vx169jMDNAODzN/TUoQwMqcU0kJytEUSZeXJR1EP9i', //@admin123
        ]);

        MasaPerpanjangan::create([
            'judul' => 'Perpanjangan Perjanjian Kerja PPPK di Lingkungan Pemerintah Kabupaten Kapuas Tahun 2026',
            'tahun' => 2026,
            'is_active' => true,
        ]);
    }
}
