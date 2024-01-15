<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\videos;
use App\Http\Controllers\Api\videosController;

use Validator;

class videosController extends Controller
{
  
    /** Récupère tous les videos de la base de données.
     *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\JsonResponse
    */

public function get(Request $request)

{
    $videos = videos::all();
    $data=[
       'status'=>200,
       'videos'=>$videos];

    return response()->json($data,200); 
   }


// ajouter une videos de la base de données.
public function add(Request $request)
{
    $validator = Validator::make($request->all(), [
        'vpath' => 'required',
        'title' => 'required', 
        
        'order' => 'required', 
    ]);

    if ($validator->fails()) {
        $data = [
            "status" => 422,
            "message" => $validator->messages(),
        ];
        return response()->json($data, 422);
    } else {
        $videos = new videos; 
        $videos->vpath = $request->vpath;
        $videos->title = $request->title;
       
        $videos->order = $request->order; 
        $videos->save();

        $data = [
            'status' => 200,
            'message' => 'Data uploaded successfully',
        ];
        return response()->json($data, 200);
    }
}

// modifier une videos par son id de la base de données.

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
$videos = videos::find($id);
$videos -> title=$request->title;
$videos->save();
$data=['status'=>200,
'message'=>'data update successfully'];
return response()->json($data,200);
}
}
// supprimer une videos par son id
public function delete($id)
{
    $videos = videos::find($id);

    if ($videos) {
        $videos->delete();
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

// Récupèrer un videos par son id de la base de données.
public function getById(Request $request , $id)
{
    $videos = videos::find($id);

    if (!$videos) {
        $data = [
            'status' => 404,
            'message' => 'page not found',
        ];

        return response()->json($data, 404);
    }

    $data = [
        'status' => 200,
        'videos' => $videos,
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

    // Récupère les videos triées selon l'ordre spécifié
    $videos = videos::orderBy('order', $direction)->get();

    $data = [
        'status' => 200,
        'videos' => $videos,
    ];

    return response()->json($data, 200);
}

}

