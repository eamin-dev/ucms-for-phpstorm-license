<?php

namespace App\Http\Controllers;

use App\Models\ThemeficArea;
use Illuminate\Http\Request;

class ThemeficAreaController extends Controller
{
    public function index(){

        $officeNames = ThemeficArea::select('id','name')->orderBy('id','desc')->get();
        return view('rapidPro.themeficArea.area',compact('officeNames'));
        
    }
    public function store(Request $request){

         $this->validate($request,[
            'name'=>'required|unique:themefic_areas,name,'.$request->id,
         ]);
 
             $data =new ThemeficArea();
             $data->name=$request->name;
             $data->save();
             $notification=array(
                                   'message'=>'ThemeficArea Successfully Added',
                                   'alert-type'=>'success'
                                    );
                                    return redirect()->route('get.themefic.area')->with($notification);
 
       }
 
 
       public function edit(Request $request){
 
         $editData=ThemeficArea::findorFail($request->id);
         $officeNames = ThemeficArea::select('id','name')->orderBy('id','desc')->get();
         return view('rapidPro.countryOffice.office-edit',compact('editData','officeNames'));
 
       }
 
       public function update(Request $request){
 
            $this->validate($request,[
                'name'=>'required|unique:themefic_areas,name,'.$request->id,
            ]);
 
             $data =ThemeficArea::findorfail($request->id);
             $data->name=$request->name;
             $data->save();
             $notification=array(
                                   'message'=>'ThemeficArea Successfully Updated',
                                   'alert-type'=>'success'
                                    );
                                    return redirect()->route('get.themefic.area')->with($notification);
 
       }
       public function delete($id){
             $data =ThemeficArea::findorfail($id);
             $data->delete();
             $notification=array(
                               'message'=>'ThemeficArea deleted  successfully',
                               'alert-type'=>'danger'
                                );
                                return redirect()->route('get.themefic.area')->with($notification);
       }
}
