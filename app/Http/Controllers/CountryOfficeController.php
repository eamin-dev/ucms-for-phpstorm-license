<?php

namespace App\Http\Controllers;

use App\Models\CountryOffice;
use Illuminate\Http\Request;

class CountryOfficeController extends Controller
{
    
    public function index(){

        $officeNames = CountryOffice::select('id','name')->orderBy('id','desc')->get();
        return view('rapidPro.countryOffice.office',compact('officeNames'));
        
    }
    public function store(Request $request){

         $this->validate($request,[
            'name'=>'required|unique:country_offices,name,'.$request->id,
         ]);
 
             $data =new CountryOffice();
             $data->name=$request->name;
             $data->save();
             $notification=array(
                                   'message'=>'CountryOffice Successfully Added',
                                   'alert-type'=>'success'
                                    );
                                    return redirect()->route('get.country.office')->with($notification);
 
       }
 
 
       public function edit(Request $request){
 
         $editData=CountryOffice::findorFail($request->id);
         $officeNames = CountryOffice::select('id','name')->orderBy('id','desc')->get();
         return view('rapidPro.countryOffice.office-edit',compact('editData','officeNames'));
 
       }
 
       public function update(Request $request){
 
            $this->validate($request,[
                'name'=>'required|unique:country_offices,name,'.$request->id,
            ]);
 
             $data =CountryOffice::findorfail($request->id);
             $data->name=$request->name;
             $data->save();
             $notification=array(
                                   'message'=>'CountryOffice Successfully Updated',
                                   'alert-type'=>'success'
                                    );
                                    return redirect()->route('get.country.office')->with($notification);
 
       }
       public function delete($id){
             $data =CountryOffice::findorfail($id);
             $data->delete();
             $notification=array(
                               'message'=>'CountryOffice deleted  successfully',
                               'alert-type'=>'danger'
                                );
                                return redirect()->route('get.country.office')->with($notification);
       }
}
