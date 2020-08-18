<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailBarangMasuk extends Model
{
    public function barang()
    {
    	return $this->belongsTo('App\Model\Barang', 'id_barang');
    }
    public function barangMasuk()
    {
    	return $this->belongsTo('App\Model\BarangMasuk', 'id_barang_masuk');
    }
}
