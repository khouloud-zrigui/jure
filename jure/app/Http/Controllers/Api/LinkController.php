<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
use Validator;
class LinkController extends Controller
{
    /** Récupère tous les liens de la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

 public function get(Request $request)
 
 {
     $Link = Link::all();
     $data=[
        'status'=>200,
        'Link'=>$Link];

     return response()->json($data,200); 
    }

// ajouter un lien de la base de données.
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'href' => 'required',
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
    $Link = new Link;
    $Link -> href=$request->href;
    $Link->save();
    $data=['status'=>200,
    'message'=>'data uploaded successfully'];
    return response()->json($data,200);
}

}

// modifier un lien par son id de la base de données.

public function update(Request $request , $id)
{
    $validator = Validator::make($request->all(), [
        'href' => 'required',
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
$Link = Link::find($id);
$Link -> href=$request->href;
$Link->save();
$data=['status'=>200,
'message'=>'data update successfully'];
return response()->json($data,200);
}}

// supprimer un lien par son id de la base de données.
public function delete($id)
{
    $Link=Link::find($id);
    $Link->delete();
    $data=['status'=>200,
    'message'=>"Data deleted"];
    return response()->json($data,200);
}
// Récupèrer un lien par son id de la base de données.
public function getById(Request $request , $id)
{
    $link = Link::find($id);

    if (!$link) {
        $data = [
            'status' => 404,
            'message' => 'Link not found',
        ];

        return response()->json($data, 404);
    }

    $data = [
        'status' => 200,
        'link' => $link,
    ];

    return response()->json($data, 200);
}
// Récupèrer un lien par son href de la base de données.
public function getByHref(Request $request, $href)
{
    $link = Link::where('href', $href)->first();

    if (!$link) {
        $data = [
            'status' => 404,
            'message' => 'Link not found',
        ];

        return response()->json($data, 404);
    }

    $data = [
        'status' => 200,
        'link' => $link,
    ];

    return response()->json($data, 200);
}

}