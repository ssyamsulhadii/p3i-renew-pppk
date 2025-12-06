<?php

namespace Database\Seeders;

use App\Models\MasaPerpanjangan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin_p3i',
            'password' => '$2y$12$Bgu5g5.4CX6vx169jMDNAODzN/TUoQwMqcU0kJytEUSZeXJR1EP9i', //@admin123
            'nama' => 'Admin P3I',
            'level' => 'admin'
        ]);


        MasaPerpanjangan::create([
            'kode_perpanjangan' => 'KOPER-2025',
            'judul' => 'Pengisian Perpanjangan Perjanjian Kerja PPPK di Lingkungan Pemerintah Kabupaten Kapuas Tahun 2025
Dari Tanggal 10 November 2025 s/d 28 November 2025',
            'label_unggah_skp' => 'SKP 2024 dan SKP bulan Oktober 2025 bernilai Baik',
            'label_unggah_absen' => 'Rekap Absensi Januari s/d Oktober 2025',
            'kode_angkatan' => ['PN2021']
        ]);
    }
}
