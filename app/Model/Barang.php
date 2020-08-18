<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function jenisBarang()
    {
    	return $this->belongsTo('App\Model\JenisBarang', 'id_jenis_barang');
    }
}
