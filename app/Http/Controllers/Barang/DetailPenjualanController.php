<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DetailPenjualan;
use App\Model\Penjualan;
use App\Model\Barang;

class DetailPenjualanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $detailPenjualan['penjualans'] = Penjualan::all();
        $detailPenjualan['barangs'] = Barang::all();
        $detailPenjualan['detailPenjualans'] = DetailPenjualan::orderby('id','DESC')->get();
        return view('barang.detailPenjualan.index', $detailPenjualan);
    }
    public function save(Request $r){
        $detailPenjualan = new DetailPenjualan;
        $detailPenjualan->id_penjualan = $r->input('id_penjualan');
        $detailPenjualan->id_barang = $r->input('id_barang');
        $detailPenjualan->jumlah = $r->input('jumlah');
        $detailPenjualan->sub_total = $r->input('sub_total');

        $detailPenjualan->save();
        return redirect()->route('detailPenjualanIndex')->with('alertTambah', " ");
    }
    public function getDataEdit($id){
        $detailPenjualan = DetailPenjualan::find($id);
        echo json_encode($detailPenjualan);
    }
    public function update(Request $r, $id){
        $detailPenjualan = DetailPenjualan::find($id);
        $detailPenjualan->id_penjualan = $r->input('id_penjualan');
        $detailPenjualan->id_barang = $r->input('id_barang');
        $detailPenjualan->jumlah = $r->input('jumlah');
        $detailPenjualan->sub_total = $r->input('sub_total');

        $detailPenjualan->save();
        return redirect()->route('detailPenjualanIndex')->with('alertEdit', " ");
    }
    public function delete($id){
        $detailPenjualan = DetailPenjualan::find($id);
        $detailPenjualan->delete();
        return redirect()->route('detailPenjualanIndex')->with('alertHapus', " ");
    }
}
