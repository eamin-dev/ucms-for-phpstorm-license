<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapidProController extends Controller
{
    

    public function createRapidPro(){

        return view('rapidPro.index-rapid');

    }

    public function rapidFlow(){

        return view('rapidPro.flow.rapidflow-index');
    }
}
