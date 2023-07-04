<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HitungController extends Controller
{

    public function hitung(Request $request){

        $kriteria = Kriteria::sum('bobot');
        $bobot1 = 0.25;
        $bobot2 = 0.2;
        $bobot3 = 0.2;
        $bobot4 = 0.15;
        $bobot5 = 0.2;

        // $bobot1 = 20/$kriteria;
        // $bobot2 = 20/$kriteria;
        // $bobot3 = 20/$kriteria;
        // $bobot4 = 20/$kriteria;
        // $bobot5 = 20/$kriteria;
        $widget1 = [
            'kriteria' => $bobot1,
        ];
        $widget2 = [
            'kriteria' => $bobot2,
        ];
        $widget3 = [
            'kriteria' => $bobot3,
        ];
        $widget4 = [
            'kriteria' => $bobot4,
        ];
        $widget5 = [
            'kriteria' => $bobot5,
        ];


        $Alternatif = Alternatif::get();
        // $data = Alternatif::orderby('kode_alternatif', 'asc')->get();
        $data = Alternatif::orderby('nama', 'asc')->get();

        $minC1 = Alternatif::min('Fasilitas');
        $maxC1 = Alternatif::max('Fasilitas');
        $minC2 = Alternatif::min('Harga');
        $maxC2 = Alternatif::max('Harga');
        $minC3 = Alternatif::min('Varian_paket');
        $maxC3 = Alternatif::max('Varian_paket');
        $minC4 = Alternatif::min('Lahan_parkir');
        $maxC4 = Alternatif::max('Lahan_parkir');
        $minC5 = Alternatif::min('Varian_background');
        $maxC5 = Alternatif::max('Varian_background');

        $C1min =[
            'alternatif' => $minC1,
        ];
        $C1max =[
            'alternatif' => $maxC1,
        ];
        $C2min =[
            'alternatif' => $minC2,
        ];
        $C2max =[
            'alternatif' => $maxC2,
        ];
        $C3min =[
            'alternatif' => $minC3,
        ];
        $C3max =[
            'alternatif' => $maxC3,
        ];
        $C4min =[
            'alternatif' => $minC4,
        ];
        $C4max =[
            'alternatif' => $maxC4,
        ];
        $C5min =[
            'alternatif' => $minC5,
        ];
        $C5max =[
            'alternatif' => $maxC5,
        ];

        $hasil = $minC1/$maxC1;
        $hasil1 =[
            'alternatif' => $hasil,
        ];

        // $hasildua = $minC2/$maxC2;
        // $hasil2 =[
        //     'alternatif' => $hasil,
        // ];

        // $hasiltiga = $minC3/$maxC3;
        // $hasil3 =[
        //     'alternatif' => $hasil,
        // ];

        // $hasilempat = $minC4/$maxC4;
        // $hasil4 =[
        //     'alternatif' => $hasil,
        // ];

        // $hasillima = $minC5/$maxC5;
        // $hasil =[
        //     'alternatif' => $hasil,
        // ];



       return view('dashboard/perhitungan/hitung', compact('hasil1','data', 'widget1', 'widget2', 'widget3', 'widget4','widget5', 'C1min', 'C1max', 'C2min', 'C2max', 'C3min', 'C3max', 'C4min', 'C4max','C5min', 'C5max'));
    }


    public function calculateSaw()
    {
        $alternatif = Alternatif::all();
        $weights = [0.25,0.2,0.2,0.15,0.2]; // Bobot kriteria

        // $minValues = $alternatives->min(); // Mendapatkan nilai minimum dari setiap kolom
        // $maxValues = $alternatives->max(); // Mendapatkan nilai maksimum dari setiap kolom

        $results = [];
        $nomor = 0;

        foreach ($alternatif as $alternatifs) {

            $fasilitas = $alternatifs->Fasilitas;
            $harga = $alternatifs->Harga;
            $varian_paket = $alternatifs->Varian_paket;
            $lahan_parkir = $alternatifs->Lahan_parkir;
            $varian_backgrounds = $alternatifs->Varian_background;
            // $keawetan = $alternative->keawetan;

            // Normalisasi setiap nilai kriteria
            $norm_fasilitas = $fasilitas /10;
            $norm_harga =  70000 / $harga ; //cost
            $norm_varian_paket = $varian_paket / 8;
            $norm_lahan_parkir = $lahan_parkir / 9;
            $norm_varian_background = $varian_backgrounds / 8;
            // $norm_keawetan = ($keawetan - $minValues->keawetan) / ($maxValues->keawetan - $minValues->keawetan);


            // Hitung hasil SAW
            $hasil = ($weights[0] * $norm_fasilitas)+ ($weights[1] * $norm_harga)  + ($weights[2] * $norm_varian_paket)
                + ($weights[3] * $norm_lahan_parkir) + ($weights[4] * $norm_varian_background);

            $nomor++;

            $nama_alt = $alternatifs->nama;
            $results[] = ['nama' => $nama_alt, 'Fasilitas' => $norm_fasilitas,'Harga' => $norm_harga,'Varian_paket' => $norm_varian_paket, 'Lahan_parkir' => $norm_lahan_parkir, 'Varian_background' => $varian_backgrounds, 'hasil'=>$hasil];
            arsort($results);
        }
        //  A1 = [1,0.875,0.875,1,7];


        return view('dashboard/perhitungan/hitung', ['results' => collect($results)->sortByDesc('hasil')->values()->all()]);
    }


}
