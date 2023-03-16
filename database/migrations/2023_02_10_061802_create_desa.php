<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('logo');
            $table->string('alamat');
            $table->integer('provinsi_id');
            $table->integer('kab_kota_id');
            $table->integer('kecamatan_id');
            $table->integer('kelurahan_id');
            $table->string('telp');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('tentang_desa');
            $table->string('background_masuk')->nullable();
            $table->string('background_utama')->nullable();
            $table->string('nama_kepala_desa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desa');
    }
}