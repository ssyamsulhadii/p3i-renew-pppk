<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasaPerpanjangan extends Model
{
    use HasFactory;

    // Nama tabel kustom
    protected $table = 'masa_perpanjangan';

    // Field yang bisa diisi (mass assignment)
    protected $guarded = [];

    // Tipe data cast
    protected $casts = [
        'kode_angkatan' => 'array', // pastikan ini
    ];

    /**
     * Get all of the kontrakPegawai for the MasaPerpanjangan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kontrakPeerpanjangan(): HasMany
    {
        return $this->hasMany(KontrakPerpanjangan::class);
    }


    public function pathFile(string $column): ?string
    {
        // Ambil isi kolom, misal: "19890909_SK.pdf"
        $filename = $this->{$column};

        if (!$filename) {
            return null; // Jika kosong
        }

        // Path yang benar
        $path = 'DATA-MASPER/' . $column . '/' . $filename;
        return asset($path);
    }
}
