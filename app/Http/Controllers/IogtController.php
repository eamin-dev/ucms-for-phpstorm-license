<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IogtController extends Controller
{
    
    public function index(){

        return view('iogt.index');
    }
}
