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



// modifier une page par son id de la base de données.

public function update(Request $request , $id)
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
$pages = pages::find($id);
$pages -> name=$request->name;
$pages->save();
$data=['status'=>200,
'message'=>'data update successfully'];
return response()->json($data,200);
}
}
// supprimer une page par son id
public function delete($id)
{
    $pages = pages::find($id);

    if ($pages) {
        $pages->delete();
        $data = [
            'status' => 200,
            'message' => "Data deleted"
        ];
    } else {
        $data = [
            'status' => 404,
            'message' => "Data not found"
        ];
    }

    return response()->json($data, $data['status']);
}

// Récupèrer un lien par son id de la base de données.
public function getById(Request $request , $id)
{
    $pages = pages::find($id);

    if (!$pages) {
        $data = [
            'status' => 404,
            'message' => 'page not found',
        ];

        return response()->json($data, 404);
    }

    $data = [
        'status' => 200,
        'pages' => $pages,
    ];

    return response()->json($data, 200);
}
}
