<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;
use Validator;

class AuthorsController extends Controller
{
    public function index(){

        $authors = Authors::all();
        $data =[
            'status'=> 200,
            'authors' => $authors
        ];
        return response()->json($data,200);
        
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'firstname'=> 'required',
            'lastname' => 'required',
            'organism' => 'required'
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
            $authors = new Authors;
            $authors->firstname=$request->firstname;
            $authors->lastname=$request->lastname;
            $authors->organism=$request->organism;

            $authors->save();
            $data=[
                "status"=>200,
                "message"=>'Data uploaded successfully'
            ];

            return response()->json($data,200);

             
        }
        
    }
    public function edit(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'firstname'=> 'required',
            'lastname' => 'required',
            'organism' => 'required'
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
            $authors = Authors::find($id);
            $authors->firstname=$request->firstname;
            $authors->lastname=$request->lastname;
            $authors->organism=$request->organism;

            $authors->save();
            $data=[
                "status"=>200,
                "message"=>'Data updated successfully'
            ];

            return response()->json($data,200);

             
        } 

    }

    public function delete($id){
        $authors=Authors::find($id);
        $authors->delete();

        $data=[
            "status"=>200,
            "message"=>'Data deleted successfully'
        ];


        return response()->json($data,200);
    }

    public function getAuthorsById($id){ 

        $authors= Authors::find($id); 

        if(is_null($authors)){ 
        return response()->json(['message' => 'Authors not fond'],404); 
        } 

        return response()->json($authors::find($id),200);
}

    public function getAuthorsByLastname($lastname){ 

    $authors= Authors::find($lastname);
    
    if(is_null($authors)){ 
    return response()->json(['message' => 'Authors not fond'],404); 
    }

    return response()->json($authors::find($lastname),200);
}

}