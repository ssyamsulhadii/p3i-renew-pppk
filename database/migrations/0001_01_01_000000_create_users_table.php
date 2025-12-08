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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('nama');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->enum('jenis_formasi', ['PPPK TEKNIS', 'PPPK KESEHATAN', "PPPK GURU"])->nullable();
            $table->char('kode_angkatan', 10)->nullable();
            $table->date('tmt_awal')->nullable();
            $table->date('tmt_akhir')->nullable();
            $table->year('bup')->nullable();
            $table->string('sk')->nullable();
            $table->string('spk')->nullable();
            $table->string('spp')->nullable();
            $table->boolean('is_done')->default(false);
            $table->enum('level', ['admin', 'member'])->default('member');
            $table->char('golongan')->nullable();
            $table->tinyInteger('mks')->default(5);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->string('email')->primary();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
