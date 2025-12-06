<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tmt_awal' => 'date',
        'tmt_akhir' => 'date',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    public function pathFile(string $column): ?string
    {
        // Ambil isi kolom, misal: "19890909_SK.pdf"
        $filename = $this->{$column};

        if (!$filename) {
            return null; // Jika kosong
        }

        // Path yang benar
        $path = 'DATA-PROFIL/' . $column . '/' . $filename;
        return asset($path);
    }


    /**
     * Get all of the kontrakPerpanjangan for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kontrakPerpanjangan(): HasMany
    {
        return $this->hasMany(KontrakPerpanjangan::class);
    }


    public function getNipAttribute()
    {
        return $this->username;
    }
}
