<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use Validator;

class CountriesController extends Controller
{  

public function index(){
    $countries = Countries::all();
    $data =[
        'status'=> 200,
        'countries' => $countries
    ];
    return response()->json($data,200);
    
}
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

public function delete($id){
    $countries=Countries::find($id);
    $countries->delete();

    $data=[
        "status"=>200,
        "message"=>'Data deleted successfully'
    ];


    return response()->json($data,200);
}

public function getCountriesById($id){ 

    $countries= Countries::find($id); 

    if(is_null($countries)){ 
    return response()->json(['message' => 'Countries not fond'],404); 
    } 

    return response()->json($countries::find($id),200);
}

public function getCountriesByName($name){ 

$countries= Countries::find($name);

if(is_null($countries)){ 
return response()->json(['message' => 'Countries not fond'],404); 
}

return response()->json($countries::find($name),200);
}

}