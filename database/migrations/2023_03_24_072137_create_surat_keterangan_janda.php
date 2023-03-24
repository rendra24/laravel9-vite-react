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
        Schema::create('surat_keterangan_janda', function (Blueprint $table) {
            $table->id();
            $table->integer('desa_id');
            $table->string('nomor_surat');
            $table->integer('keluarga_anggota_id');
            $table->string('nik');
            $table->string('nama_suami');
            $table->string('alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_janda');
    }
};