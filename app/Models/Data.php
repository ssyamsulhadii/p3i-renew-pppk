<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Data extends Model
{
    use HasFactory;

    // Nama tabel kustom
    protected $table = 'data';

    protected $guarded = [];

    // Tipe data cast
    protected $casts = [
        'tanggal_lahir' => 'date',
        // 'data_done' => 'boolean',
    ];

    // Relasi ke masa perpanjangan
    public function masaPerpanjangan()
    {
        return $this->belongsTo(MasaPerpanjangan::class, 'masa_perpanjangan_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'nip_pppk';
    }


    // (Opsional) accessor nama lengkap otomatis
    public function getNamaLengkapAttribute()
    {
        $namaLengkap = trim(($this->gelar_depan ? $this->gelar_depan . ' ' : '') . $this->nama . ($this->gelar_belakang ? ', ' . $this->gelar_belakang : ''));
        return $namaLengkap;
    }


    public function pathFile(string $column): ?string
    {
        $path = $this->{$column};

        if (!$path) {
            return asset('images/file-not-found.png');
        }

        // Normalisasi path: hapus "public/" di awal jika ada
        $cleanPath = preg_replace('/^public\//', '', $path);

        // Cek file di direktori public
        $publicPath = public_path($cleanPath);

        if (file_exists($publicPath)) {
            return asset($cleanPath);
        }

        // fallback jika file hilang
        return asset('images/file-not-found.png');
    }
}
