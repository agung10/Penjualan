<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    public function distributor()
    {
    	return $this->belongsTo('App\Model\Distributor', 'id_distributor');
    }
    public function petugas()
    {
    	return $this->belongsTo('App\Model\Petugas', 'id_petugas');
    }
}
