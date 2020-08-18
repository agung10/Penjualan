<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Petugas;
use App\Model\Distributor;
use App\Model\BarangMasuk;
use App\Model\DetailBarangMasuk;
use App\Model\Barang;
use App\Model\JenisBarang;
use App\Model\Penjualan;
use App\Model\DetailPenjualan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $d['petugas'] = Petugas::all()->count();
        $d['distributors'] = Distributor::all()->count();
        $d['barangMasuks'] = BarangMasuk::all()->count();
        $d['detailBarangMasuks'] = DetailBarangMasuk::all()->count();
        $d['barangs'] = Barang::all()->count();
        $d['jenis_barangs'] = JenisBarang::all()->count();
        $d['penjualans'] = Penjualan::all()->count();
        $d['detailPenjualans'] = DetailPenjualan::all()->count();
        return view('home', $d);
    }
}
