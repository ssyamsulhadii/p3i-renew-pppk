<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kontrak_perpanjangan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->string('surat_pengantar');
            $table->string('surat_sehat');
            $table->string('sptjm');
            $table->string('skp');
            $table->string('rekap_absensi');
            $table->boolean('is_relokasi')->default(false);
            $table->boolean('is_done')->default(false);
            $table->boolean('is_edit')->default(true);
            $table->string('spk_final')->nullable();
            $table->date('tmt_awal')->nullable();
            $table->date('tmt_akhir')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status')->nullable();
            // Relasi ke masa perpanjangan
            $table->foreignId('masa_perpanjangan_id')
                ->constrained('masa_perpanjangan')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kontrak_perpanjangan');
    }
};
