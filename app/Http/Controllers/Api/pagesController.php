<?php

namespace App\Http\Controllers\Api;
use App\Models\Pages;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\pagesController;

class pagesController extends Controller
{
    /** Récupère tous les liens de la base de données.
     *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\JsonResponse
    */

public function get(Request $request)

{
    $pages = pages::all();
    $data=[
       'status'=>200,
       'pages'=>$pages];

    return response()->json($data,200); 
   }


// ajouter un lien de la base de données.
public function add(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
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
$pages = new pages;
$pages -> name=$request->name;
$pages->save();
$data=['status'=>200,
'message'=>'data uploaded successfully'];
return response()->json($data,200);
}

}


}
