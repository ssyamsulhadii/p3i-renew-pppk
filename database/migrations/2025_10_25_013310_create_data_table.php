<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('nama');
            $table->string('nip_pppk');
            $table->string('unit_kerja');
            $table->string('jabatan');
            $table->string('telpon');
            $table->string('pendidikan_terakhir');

            $table->enum('jenis_formasi', ['PPPK Guru', 'PPPK Kesehatan', 'PPPK Teknis'])->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();

            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('catatan')->nullable();
            $table->string('status')->nullable();
            // $table->boolean('done_text')->default(false);

            // Dokumen
            $table->string('surat_pengantar')->nullable();
            $table->string('surat_sehat')->nullable(); //new
            $table->string('sptjm')->nullable();
            $table->string('skp')->nullable();
            $table->string('absensi')->nullable(); //new
            $table->string('sk_terakhir')->nullable();
            $table->string('spk')->nullable(); //new
            $table->string('pas_foto')->nullable();

            $table->boolean('data_done')->default(false);

            // Relasi ke masa perpanjangan
            $table->foreignId('masa_perpanjangan_id')
                ->constrained('masa_perpanjangan')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
