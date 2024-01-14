<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    // ajouter un lien de la base de données.
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
else
{
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
}
