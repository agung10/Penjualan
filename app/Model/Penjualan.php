<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public function petugas()
    {
    	return $this->belongsTo('App\Model\Petugas', 'id_petugas');
    }
}
