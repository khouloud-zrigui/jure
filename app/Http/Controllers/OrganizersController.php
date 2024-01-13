<?php

namespace App\Http\Controllers;

use App\Models\Keynotespeakers;
use App\Models\Organizers;
use App\Models\Sponsors;
use Illuminate\Http\Request;

class OrganizersController extends Controller
{

    //get all organizers
    public function index()
    {
        $organizers = Organizers::all();

        return response()->json($organizers);
    }

    // get by id organizers
    public function show($id)
    {
        $organizers  = Organizers::find($id);

        if (!$organizers ) {
            return response()->json(['message' => 'Organizers not found'], 404);
        }

        return response()->json($organizers );
    }

    //supprimer organizers
    public function deleteOrganizers(Request $request,$id)
    {
        $organizers = Organizers::find($id);

        if (is_null($organizers)) {
            return response()->json(['message' => '$organizers not found'], 404);
        }

        $organizers->delete();
        return response()->json(['message' => '$organizers deleted successfully']);
    }

    //create Organizers
    public function create(Request $request)
    {
        $organizers= Organizers::create($request->all());
        return response( $organizers,201);

    }

    //update organizers

    public function updateOrganizers(Request $request,$id){
        $organizers= Organizers::find($id);
        if(is_null($organizers)){
            return response()->json(['message' => 'organizers not fond'],404);
        }
        $organizers->update($request->all());
        return response($organizers,200);
    }
}
