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
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id();
            $table->integer('no_kk');
            $table->text('alamat')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rw')->nullable();
            $table->string('rt')->nullable();
            $table->string('umkm')->nullable();
            $table->boolean('isTanahGarapan');
            $table->double('luas_tanah_garapan')->default(0);
            $table->integer('air_minum_id');
            $table->integer('sanitasi_id');
            $table->integer('gaji_id');
            $table->integer('dinding_id');
            $table->integer('lantai_id');
            $table->integer('atap_id');
            $table->integer('aset_id');
            $table->string('aset_transportasi')->nullable();
            $table->integer('penerangan_id');
            $table->integer('bbm_id');
            $table->integer('lembaga_ekonomi_id');
            $table->integer('lembaga_pendidikan_id');
            $table->integer('bantuan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluarga');
    }
};