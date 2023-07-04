<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Studio;
use Illuminate\Http\Request;

class LandingPagesController extends Controller
{
        public function index()
     {
         return view('pages.Home');
     }

    public function studio(){
        $studio = Studio::all();
        return view('pages.Studio',compact(['studio']));

    }

    public function contact(){
        return view ('pages.Contact');
    }
}
