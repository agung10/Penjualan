<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    public function barang()
    {
    	return $this->belongsTo('App\Model\Barang', 'id_barang');
    }
    public function penjualan()
    {
    	return $this->belongsTo('App\Model\Penjualan', 'id_penjualan');
    }
}
