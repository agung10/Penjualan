<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Distributor;

class DistributorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $distributor['distributors'] = Distributor::orderby('id', 'DESC')->get();
        return view('pengguna.distributor.index', $distributor);
    }
    public function save(Request $r){
        $distributor = new Distributor;
        $distributor->nama = $r->input('nama');
        $distributor->kota_asal = $r->input('kota_asal');
        $distributor->alamat = $r->input('alamat');
        $distributor->email = $r->input('email');
        $distributor->telp = $r->input('telp');

        $distributor->save();
        return redirect()->route('tampilanDistributor')->with('alertTambah', $r->input('nama'));
    }
    public function getDataEdit($id){
        $distributor = Distributor::find($id);
        echo json_encode($distributor);
    }
    public function update(Request $r, $id){
        $distributor = Distributor::find($id);
        $distributor->nama = $r->input('nama');
        $distributor->kota_asal = $r->input('kota_asal');
        $distributor->alamat = $r->input('alamat');
        $distributor->email = $r->input('email');
        $distributor->telp = $r->input('telp');

        $distributor->save();
        return redirect()->route('tampilanDistributor')->with('alertEdit', $r->input('nama'));
    }
    public function delete($id){
        $distributor = Distributor::find($id);
        $nama = $distributor->nama;
        $distributor->delete();
        return redirect()->route('tampilanDistributor')->with('alertHapus', $nama);
    }
}
