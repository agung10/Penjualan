<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_nota')->unique();
            $table->date('tanggal_masuk');
            $table->bigInteger('id_distributor')->unsigned();
            $table->bigInteger('id_petugas')->unsigned();
            $table->bigInteger('total');
            $table->foreign('id_distributor')->references('id')->on('distributors')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('barang_masuks');
    }
}
