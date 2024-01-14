<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

use Validator;

class SessionController extends Controller
{
    public function index(){

        $session = Session::all();
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
            $session = new Session;
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
            $session = Session::find($id);
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
 //Supprimer une special session selon id

    public function delete($id){
        $session=Session::find($id);
        $session->delete();
        $data=[
            "status"=>200,
            "message"=>'Data deleted successfully'
        ];
        return response()->json($data,200);
    }

// Get Specila session by id
    public function getSessionById($id){ 

        $session= Session::find($id); 

        if(is_null($session)){ 
        return response()->json(['message' => 'Special Session not fond'],404); 
        } 

        return response()->json($session::find($id),200);
}

//Get Special session by title 
    public function getSessionByTitle($title){ 

    $session= Session::find($title);
    
    if(is_null($session)){ 
    return response()->json(['message' => 'Session not fond'],404); 
    }

    return response()->json($session::find($title),200);
} 

//Special session orderBy order

public function orderBy(Request $request, $direction = 'asc')
{
    $validDirections = ['asc', 'desc'];
 
    // Vérifie si la direction spécifiée est valide
    if (!in_array($direction, $validDirections)) {
        $data = [
            'status' => 400,
            'message' => 'Invalid sorting direction. Use "asc" or "desc".',
        ];
        return response()->json($data, 400);
    }
 
    // Récupère les session triées selon l'ordre spécifié
    $session = Session::orderBy('order', $direction)->get();
 
    $data = [
        'status' => 200,
        'session' => $session,
    ];
 
    return response()->json($data, 200);
}

}
