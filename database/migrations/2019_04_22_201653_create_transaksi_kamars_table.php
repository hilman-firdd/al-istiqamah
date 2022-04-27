<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_kamars', function (Blueprint $table) {
            $table->bigIncrements('id');
              $table->integer('user_id');
            $table->string('invoice_id')->unique();
            $table->integer('tamu_id');
            $table->integer('kamar_id');
            $table->integer('jumlah_dewasa');
            $table->integer('jumlah_anak');
            $table->dateTime('tgl_checkin');
            $table->dateTime('tgl_checkout');
            $table->string('total_biaya');
            $table->string('deposit');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('transaksi_kamars');
    }
}
