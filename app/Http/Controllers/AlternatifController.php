<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index() {
        return view('dashboard/alternatif/index', [
            'users' => Alternatif::all(),
            'title' => 'Data alternatif'
        ]);
    }
    public function add() {
        return view('dashboard/alternatif/add',[
            'title' => 'Tambah Data alternatif'
        ]);
    }
    public function edit($id){

        $alternatif = Alternatif::where('id', $id)->first();

        return view('dashboard/alternatif/edit', [
            'alternatif' => $alternatif,
            'title' => 'Edit Data alternatif'
        ]);

    }

    public function update(Request $request, $id) {
        // $kode_alternatif      = $request->input('kode_alternatif');
        $nama      = $request->input('nama');
        $fasilitas   = $request->input('Fasilitas');
        $harga = $request->input('Harga');
        $varian_paket = $request->input('Varian_paket');
        $lahan_parkir = $request->input('Lahan_parkir');
        $varian_background = $request->input('Varian_background');

        $alternatif = Alternatif::where('id', $id)->first();
        // $alternatif->kode_alternatif    = $kode_alternatif;
        $alternatif->nama    = $nama;
        $alternatif->Fasilitas = $fasilitas;
        $alternatif->Harga = $harga;
        $alternatif->Varian_paket = $varian_paket;
        $alternatif->Lahan_parkir = $lahan_parkir;
        $alternatif->Varian_background = $varian_background;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }


    public function dashboard(){
        $alternatif= Alternatif::count();

        return view('main', compact('alternatif'));

    }

    public function store(Request $request) {
        // $kode_alternatif     = $request->input('kode_alternatif');
        $nama = $request->input('nama');
        $fasilitas = $request->input('fasilitas');
        $harga = $request->input('harga');
        $varian_paket = $request->input('varian_paket');
        $lahan_parkir = $request->input('lahan_parkir');
        $varian_background = $request->input('varian_background');

        $alternatif           = new Alternatif;
        // $alternatif->kode_alternatif    = $kode_alternatif;
        $alternatif->nama = $nama;
        $alternatif->fasilitas = $fasilitas;
        $alternatif->harga = $harga;
        $alternatif->varian_paket = $varian_paket;
        $alternatif->lahan_parkir = $lahan_parkir;
        $alternatif->varian_background = $varian_background;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }
    public function delete($id) {
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->delete();
        return redirect()->back();
    }
}
