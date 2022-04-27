<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('nama');
            $table->string('nama_belakang')->nullable();
            $table->string('tipe_identitas');
            $table->string('nomor_identitas');
            $table->string('warga_negara');
            $table->string('alamat_jalan');
            $table->string('alamat_kabupaten');
            $table->string('alamat_provinsi');
            $table->string('nomor_telp');
            $table->string('email');
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
        Schema::dropIfExists('tamus');
    }
}
