<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('masa_perpanjangan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_perpanjangan');
            $table->string('judul');
            $table->string('label_unggah_skp');
            $table->string('label_unggah_absen');
            $table->string('lampiran')->nullable();
            $table->string('tte_kolektif')->nullable();
            $table->json('kode_angkatan');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masa_perpanjangan');
    }
};
