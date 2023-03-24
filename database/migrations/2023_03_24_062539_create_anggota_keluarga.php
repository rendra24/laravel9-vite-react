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
        Schema::create('keluarga_anggota', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_ktp')->nullable();
            $table->integer('keluarga_id');
            $table->integer('nik');
            $table->string('nama');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('golongan_darah');
            $table->string('agama');
            $table->string('hubungan_keluarga');
            $table->integer('anak_ke');
            $table->string('status_pendidikan');
            $table->integer('lembaga_pendidikan_id');
            $table->string('pin_hash');
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluarga_anggota');
    }
};
