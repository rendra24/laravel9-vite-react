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
        Schema::create('surat_kematian', function (Blueprint $table) {
            $table->id();
            $table->integer('desa_id');
            $table->string('nomor_surat');
            $table->integer('keluarga_anggota_id');
            $table->string('nik');
            $table->date('tanggal_kematian');
            $table->string('tempat_meninggal');
            $table->integer('kelurahan_id');
            $table->integer('kecamatan_id');
            $table->integer('kota_id');
            $table->integer('provinsi_id');
            $table->string('sebab_meninggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_kematian');
    }
};
