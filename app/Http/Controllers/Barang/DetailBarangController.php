<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DetailBarangMasuk;
use App\Model\BarangMasuk;
use App\Model\Barang;

class DetailBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $barang['barangs'] = Barang::all();
        $barang['barangMasuks'] = BarangMasuk::all();
        $barang['detailBarangs'] = DetailBarangMasuk::orderby('id','DESC')->get();
        return view('barang.detailBarang.index', $barang);
    }
    public function save(Request $r){
        $detailBarang = new DetailBarangMasuk;
        $detailBarang->id_barang_masuk = $r->input('id_barang_masuk');
        $detailBarang->id_barang = $r->input('id_barang');
        $detailBarang->jumlah = $r->input('jumlah');
        $detailBarang->sub_total = $r->input('sub_total');

        $detailBarang->save();
        return redirect()->route('detailBarangIndex')->with('alertTambah', " ");
    }
    public function getDataEdit($id){
        $detailBarang = DetailBarangMasuk::find($id);
        echo json_encode($detailBarang);
    }
    public function update(Request $r, $id){
        $detailBarang = DetailBarangMasuk::find($id);
        $detailBarang->id_barang_masuk = $r->input('id_barang_masuk');
        $detailBarang->id_barang = $r->input('id_barang');
        $detailBarang->jumlah = $r->input('jumlah');
        $detailBarang->sub_total = $r->input('sub_total');

        $detailBarang->save();
        return redirect()->route('detailBarangIndex')->with('alertEdit', " ");
    }
    public function delete($id){
        $detailBarang = DetailBarangMasuk::find($id);
        $detailBarang->delete();
        return redirect()->route('detailBarangIndex')->with('alertHapus', " ");
    }
}
