<?php

namespace App\Http\Controllers\Api;
use App\Models\Countries;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountriesController extends Controller
{ 
//get all countires de la base de données.
    public function index(){

        $countries = Countries::all();
        $data =[
            'status'=> 200,
            'countries' => $countries
        ];
        return response()->json($data,200);
        
    }
// ajouter un countries de la base de données.
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=> 'required',
            
        ]);
        if($validator->fails())
        {
            $data=[
                "status"=>422,
                "message"=>$validator->messages()
            ];
            return response()->json($data,422);
        }
        else{
            $countries = new Countries;
            $countries->name=$request->name;
          
    
            $countries->save();
            $data=[
                "status"=>200,
                "message"=>'Data uploaded successfully'
            ];
    
            return response()->json($data,200);
    
             
        }
        
    }
// éditer un countries de la base de données.
    public function edit(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'name'=> 'required',
            
        ]);
        if($validator->fails())
        {
            $data=[
                "status"=>422,
                "message"=>$validator->messages()
            ];
            return response()->json($data,422);
        }
        else{
            $countries = Countries::find($id);
            $countries->name=$request->name;
           
    
            $countries->save();
            $data=[
                "status"=>200,
                "message"=>'Data updated successfully'
            ];
    
            return response()->json($data,200);
    
             
        } 
    
    }

}
