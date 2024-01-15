<?php

namespace App\Http\Controllers\Api;
use App\Models\Specialsessions;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecialsessionsController extends Controller
{
    //get all Special sessions de la base de données.
    public function index(){

        $session = Specialsessions::all();
        $data =[
            'status'=> 200,
            'Session' => $session
        ];
        return response()->json($data,200);
        
    }
    //Ajouter une session special 
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'description' => 'required',
            'order' => 'required'
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
            $session = new Specialsessions;
            $session->title=$request->title;
            $session->description=$request->description;
            $session->order=$request->order;

            $session->save();
            $data=[
                "status"=>200,
                "message"=>'Data uploaded successfully'
            ];

            return response()->json($data,200);
    
        }
        
    }
    // modifier une special session selon id
    public function edit(Request $request, $id){

        $validator = Validator::make($request->all(),[
           'title'=> 'required',
           'description' => 'required',
           'order' => 'required'
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
           $session = Specialsessions::find($id);
           $session->title=$request->title;
           $session->description=$request->description;
           $session->order=$request->order;

           $session->save();
           $data=[
               "status"=>200,
               "message"=>'Data updated successfully'
           ];

       
           return response()->json($data,200);        

       } 

   }
}
