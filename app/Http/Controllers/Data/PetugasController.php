<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Petugas;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $petugas['petugas'] = Petugas::orderby('id', 'DESC')->get();
        return view('pengguna.petugas.index', $petugas);
    }
    public function save(Request $r){
        $petugas = new Petugas;
        $petugas->nama = $r->input('nama');
        $petugas->alamat = $r->input('alamat');
        $petugas->email = $r->input('email');
        $petugas->telp = $r->input('telp');

        $petugas->save();
        return redirect()->route('tampilanPetugas')->with('alertTambah', $r->input('nama'));
    }
    public function getDataEdit($id){
        $petugas = Petugas::find($id);
        echo json_encode($petugas);
    }
    public function update(Request $r, $id){
        $petugas = Petugas::find($id);
        $petugas->nama = $r->input('nama');
        $petugas->alamat = $r->input('alamat');
        $petugas->email = $r->input('email');
        $petugas->telp = $r->input('telp');

        $petugas->save();
        return redirect()->route('tampilanPetugas')->with('alertEdit', $r->input('nama'));
    }
    public function delete($id){
        $petugas = Petugas::find($id);
        $nama = $petugas->nama;
        $petugas->delete();
        return redirect()->route('tampilanPetugas')->with('alertHapus', $nama);
    }
}
