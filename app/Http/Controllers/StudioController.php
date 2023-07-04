<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller {

    public function index() {
        return view('dashboard/studio/index', [
            'users' => Studio::all(),
            'title' => 'Data Studio'
        ]);
    }
    public function add() {
        return view('dashboard/studio/add',[
            'title' => 'Tambah Data Studio'
        ]);
    }
    public function edit($id){

        $studio = Studio::where('id', $id)->first();

        return view('dashboard/studio/edit', [
            'studio' => $studio,
            'title' => 'Edit Data Studio'
        ]);

    }

    public function update(Request $request, $id) {
        $nama_studio      = $request->input('nama_studio');
        $lokasi       = $request->input('lokasi');

        $studio = Studio::where('id', $id)->first();
        $studio->nama_studio    = $nama_studio;
        $studio->lokasi     = $lokasi;

        $studio->save();

        return redirect()->to('/studio');
    }


    public function dashboard(){
        $studio= Studio::count();

        return view('dashboard/studio/index', compact('studio'));

    }

    public function store(Request $request) {
        $nama_studio      = $request->input('nama_studio');
        $lokasi       = $request->input('lokasi');

        $studio           = new Studio;
        $studio->nama_Studio    = $nama_studio;
        $studio->lokasi     = $lokasi;


        $studio->save();

        return redirect()->to('/studio');
    }
    public function delete($id) {
        $studio = Studio::where('id', $id)->first();
        $studio->delete();
        return redirect()->back();
    }
}
