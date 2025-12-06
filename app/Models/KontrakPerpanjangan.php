<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class KontrakPerpanjangan extends Model
{
    protected $table = 'kontrak_perpanjangan';
    protected $guarded = [];
    protected $casts = [
        'tmt_awal' => 'date',
        'tmt_akhir' => 'date',
    ];

    // Relasi ke masa perpanjangan
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // Relasi ke masa perpanjangan
    public function masaPerpanjangan()
    {
        return $this->belongsTo(MasaPerpanjangan::class, 'masa_perpanjangan_id', 'id');
    }

    protected function masaKontrak(): Attribute
    {
        return Attribute::get(function () {
            if (!$this->tmt_awal || !$this->tmt_akhir) {
                return null;
            }

            return $this->tmt_awal->format('d-m-Y') . ' s/d ' . $this->tmt_akhir->format('d-m-Y');
        });
    }

    public function pathFile(string $column): ?string
    {
        $fileName = $this->{$column};

        if (!$fileName) {
            return asset('dokumen/file-not-found.pdf');
        }

        // Ambil kode perpanjangan dari relasi
        $kode = optional($this->masaPerpanjangan)->kode_perpanjangan;

        if (!$kode) {
            return asset('dokumen/file-not-found.pdf');
        }

        // Buat path relatif folder
        $relativePath = "{$kode}/{$column}/{$fileName}";

        // Path absolut ke public/
        $fullPath = public_path($relativePath);

        return file_exists($fullPath)
            ? asset($relativePath)
            : asset('dokumen/file-not-found.pdf');
    }
}
