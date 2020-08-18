<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\BarangMasuk;
use App\Model\Distributor;
use App\Model\Petugas;

class BarangMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $barang['petugas'] = Petugas::all();
        $barang['distributors'] = Distributor::all();
        $barang['barang_masuks'] = BarangMasuk::orderby('id', 'DESC')->get();
        return view('barang.barangMasuk.index', $barang);
    }
    public function save(Request $r){
        $barang = BarangMasuk::orderBy('id', 'DESC')->first();
        if(!empty($barang->no_nota)){
            $nota = "AM".sprintf('%04d', $barang->no_nota + 1);
        }
        else{
            $nota = "AM".sprintf('%04d', 1);
        }
        $barangMasuk = new BarangMasuk;
        $barangMasuk->no_nota = $nota;
        $barangMasuk->tanggal_masuk = $r->input('tanggal_masuk');
        $barangMasuk->id_distributor = $r->input('id_distributor');
        $barangMasuk->id_petugas = $r->input('id_petugas');
        $barangMasuk->total = $r->input('total');

        $barangMasuk->save();
        return redirect()->route('barangMasukIndex')->with('alertTambah', $nota);
    }
    public function getDataEdit($id){
        $barangMasuk = BarangMasuk::find($id);
        echo json_encode($barangMasuk);
    }
    public function update(Request $r, $id){
        $barangMasuk = BarangMasuk::find($id);
        $no_nota = $barangMasuk->no_nota;
        $barangMasuk->tanggal_masuk = $r->input('tanggal_masuk');
        $barangMasuk->id_distributor = $r->input('id_distributor');
        $barangMasuk->id_petugas = $r->input('id_petugas');
        $barangMasuk->total = $r->input('total');

        $barangMasuk->save();
        return redirect()->route('barangMasukIndex')->with('alertEdit', $no_nota);
    }
    public function delete($id){
        $barangMasuk = BarangMasuk::find($id);
        $no_nota = $barangMasuk->no_nota;
        $barangMasuk->delete();
        return redirect()->route('barangMasukIndex')->with('alertHapus', $no_nota);
    }
}
