<?php

namespace App\Http\Controllers;

use App\Models\RapidFlow;
use Illuminate\Http\Request;

class RapidProController extends Controller
{
    

    public function createRapidPro(){

        return view('rapidPro.index-rapid');

    }

    public function rapidFlow(){

        return view('rapidPro.flow.rapidflow-index');
    }

    public function storeTRapidFlow(Request $request){

            $request->validate([
                
                'question_title'=> 'required',
                'ans_Type' =>'required'
            ]);

        $rapiadflow = new RapidFlow();
        
    }
}
