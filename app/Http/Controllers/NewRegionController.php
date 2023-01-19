<?php

namespace App\Http\Controllers;

class NewRegionController extends Controller
{

    public function viewRegion()
    {

        return view('file-report.regions');
    }

    public function getDetails(){

        return view('file-report.countrydetails');
    }
}
