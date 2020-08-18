<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\JenisBarang;

class JenisBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $d['jenis_barangs'] = JenisBarang::orderby('id', 'DESC')->get();
        return view('barang.jenisBarang.index', $d);
    }
    public function save(Request $r){
        $jenisBarang = new JenisBarang;
        $jenisBarang->jenis_barang = $r->input('jenis_barang');

        $jenisBarang->save();
        return redirect()->route('jenisBarangIndex')->with('alertTambah', $r->input('jenis_barang'));
    }
    public function getDataEdit($id){
        $jenisBarang = JenisBarang::find($id);
        echo json_encode($jenisBarang);
    }
    public function update(Request $r, $id){
        $jenisBarang = JenisBarang::find($id);
        $jenisBarang->jenis_barang = $r->input('jenis_barang');

        $jenisBarang->save();
        return redirect()->route('jenisBarangIndex')->with('alertEdit', $r->input('jenis_barang'));
    }
    public function delete($id){
        $jenisBarang = JenisBarang::find($id);
        $jenis_barang = $jenisBarang->jenis_barang;
        $jenisBarang->delete();
        return redirect()->route('jenisBarangIndex')->with('alertHapus', $jenis_barang);
    }
}
