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
        Schema::create('surat_kelahiran', function (Blueprint $table) {
            $table->id();
            $table->integer('desa_id');
            $table->string('nomor_surat');
            $table->date('tanggal_lahir');
            $table->time('waktu_lahir');
            $table->string('tempat_lahir');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->string('nama_anak');
            $table->integer('anak_ke');
            $table->integer('nik_ibu');
            $table->integer('nik_ayah');
            $table->integer('pelapor_id');
            $table->integer('nik_pelapor');
            $table->string('hubungan_pelapor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_kelahiran');
    }
};