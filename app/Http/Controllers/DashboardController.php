<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Studio;

class DashboardController extends Controller {

    public function index() {

        $studio= Studio::count();
        $kriteria= Kriteria::count();
        $alternatif= Alternatif::count();


        return view('dashboard.index',[
            'title' => 'Dashboard'
        ], compact('studio','kriteria','alternatif'))
        ;
        // return view('dashboard.index',[
        //     'title' => 'Dashboard'
        // ], compact('kriteria','alternatif'))
        // ;




    }

}
