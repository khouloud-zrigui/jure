<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\photos;
use App\Http\Controllers\Api\photosController;

use Validator;

class photosController extends Controller
{
  
    /** Récupère tous les photos de la base de données.
     *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\JsonResponse
    */

public function get(Request $request)

{
    $photos = photos::all();
    $data=[
       'status'=>200,
       'photos'=>$photos];

    return response()->json($data,200); 
   }


// ajouter une photos de la base de données.
public function add(Request $request)
{
    $validator = Validator::make($request->all(), [
        'vpath' => 'required',
        'title' => 'required', 
        
        'order' => 'required', // Suppression de l'espace en trop après 'order'
    ]);

    if ($validator->fails()) {
        $data = [
            "status" => 422,
            "message" => $validator->messages(),
        ];
        return response()->json($data, 422);
    } else {
        $photo = new Photos; // Ajustement du nom de la classe du modèle
        $photo->vpath = $request->vpath;
        $photo->title = $request->title;
       
        $photo->order = $request->order; // Ajustement du nom de la colonne
        $photo->save();

        $data = [
            'status' => 200,
            'message' => 'Data uploaded successfully',
        ];
        return response()->json($data, 200);
    }
}

// modifier une photos par son id de la base de données.

public function update(Request $request , $id)
{
    $validator = Validator::make($request->all(), [
        'vpath' => 'required',
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
$photos = photos::find($id);
$photos -> title=$request->title;
$photos->save();
$data=['status'=>200,
'message'=>'data update successfully'];
return response()->json($data,200);
}
}
// supprimer une photos par son id
public function delete($id)
{
    $photos = photos::find($id);

    if ($photos) {
        $photos->delete();
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

// Récupèrer un photos par son id de la base de données.
public function getById(Request $request , $id)
{
    $photos = photos::find($id);

    if (!$photos) {
        $data = [
            'status' => 404,
            'message' => 'page not found',
        ];

        return response()->json($data, 404);
    }

    $data = [
        'status' => 200,
        'photos' => $photos,
    ];

    return response()->json($data, 200);
}
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

    // Récupère les photos triées selon l'ordre spécifié
    $photos = Photos::orderBy('order', $direction)->get();

    $data = [
        'status' => 200,
        'photos' => $photos,
    ];

    return response()->json($data, 200);
}

}

