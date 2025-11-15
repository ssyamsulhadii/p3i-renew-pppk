<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasaPerpanjangan extends Model
{
    use HasFactory;

    // Nama tabel kustom
    protected $table = 'masa_perpanjangan';

    // Field yang bisa diisi (mass assignment)
    protected $fillable = [
        'judul',
        'tahun',
        'is_active',
    ];

    // Tipe data cast
    protected $casts = [
        'tahun' => 'integer',
        // 'is_active' => 'boolean',
    ];

    // Relasi: satu masa perpanjangan punya banyak data pegawai
    public function dataPegawai()
    {
        return $this->hasMany(Data::class, 'masa_perpanjangan_id', 'id');
    }
}
