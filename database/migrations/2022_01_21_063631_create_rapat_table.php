<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapat', function (Blueprint $table) {
            $table->bigIncrements('id_rapat');
            $table->date('tanggal_rapat');
            $table->time('jam_rapat');
            $table->unsignedBigInteger('id_penyelenggara');
            $table->string('lokasi');
            $table->text('keperluan');
            $table->timestamps();

            $table->foreign('id_penyelenggara')->references('id_penyelenggara')->on('penyelenggara')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapat');
    }
}
