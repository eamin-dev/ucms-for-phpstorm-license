<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlowRequest;
use App\Models\CountryOffice;
use App\Models\Flow;
use App\Models\ThemeficArea;
use Illuminate\Http\Request;

class RapidProFlowController extends Controller
{
    public function createRapidPro(){

        $countryOffices =CountryOffice::select('id','name')->get();
        $areaNames = ThemeficArea::select('id','name')->get();
        $allFlows = Flow::with(['countryOffice','themeficArea'])->orderBy('id','asc')->get();
        return view('rapidPro.index-rapid',compact('countryOffices','areaNames','allFlows'));

    }

    public function storeFlow(FlowRequest $request){

        //return $request->toArray();

        try {

            $flow = new Flow();
            $flow->country_office_id = $request->country_office_id;
            $flow->date = $request->date;
            $flow->file_id = $request->file_id;
            $flow->themefic_area_id = $request->themefic_area_id;
            $flow->save();

            $notification = array(
                            'message'=> 'Rapid-Flow created successfully',
                            'alert-type'=> 'success', 
                );
                return redirect()->route('rapid.pro.create')->with($notification);

        } catch (\Throwable $th) {
            throw $th;
        }

    }


}
