<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBarangMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_barang_masuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_barang_masuk')->unsigned();
            $table->bigInteger('id_barang')->unsigned();
            $table->bigInteger('jumlah');
            $table->bigInteger('sub_total');
            $table->foreign('id_barang_masuk')->references('id')->on('barang_masuks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barangs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('detail_barang_masuks');
    }
}
