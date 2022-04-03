<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('invoice_id')->unique();
            $table->date('tgl_cek_in');
            $table->date('tgl_cek_out');
            $table->integer('jmlh_kamar');
            $table->string('nama_pemesan');
            $table->string('email');
            $table->string('kamar_id');
            $table->string('no_telp');
            $table->string('nama_tamu');
            $table->bigInteger('price');
            $table->string('status')->default('booking');
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
        Schema::dropIfExists('pemesanans');
    }
}
