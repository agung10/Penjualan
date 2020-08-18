<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_faktur')->unique();
            $table->bigInteger('id_petugas')->unsigned();
            $table->date('tanggal_penjualan');
            $table->string('bayar');
            $table->string('sisa');
            $table->string('total');
            $table->foreign('id_petugas')->references('id')->on('petugas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('penjualans');
    }
}
