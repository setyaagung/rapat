<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaRapatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_rapat', function (Blueprint $table) {
            $table->bigIncrements('id_peserta_rapat');
            $table->unsignedBigInteger('id_rapat');
            $table->unsignedBigInteger('id_pegawai');
            $table->timestamps();

            $table->foreign('id_rapat')->references('id_rapat')->on('rapat')->onDelete('cascade');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_rapats');
    }
}
