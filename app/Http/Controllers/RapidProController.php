<?php

namespace App\Http\Controllers;

use App\Http\Requests\RapidflowRequest;
use App\Models\RapidFlow;
use Illuminate\Http\Request;

class RapidProController extends Controller
{
    

    public function createRapidPro(){

       
        return view('rapidPro.index-rapid');

    }

    public function rapidFlow(){

        $allData = RapidFlow::select('id','question_title','ans_type')->orderBy('id','asc')->get();
        return view('rapidPro.flow.rapidflow-index',compact('allData'));
    }

    public function storeTRapidFlow(RapidflowRequest $request){

        
         RapidFlow::create([
                'question_title'=> $request->question_title,
                'ans_type' => $request->ans_type,
                'multiple_answer'=> $request->multiple_answer,
                'input_answer'=> $request->input_answer,
            ]);

      return redirect()->back();
        
    }

    public function rapidProJson(Request $request){


        $rapidFlowjson = RapidFlow::where('id',$request->id)->first();

        return response()->json($rapidFlowjson);


    }
}
