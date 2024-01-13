<?php

namespace App\Http\Controllers;

use App\Models\Keynotespeakers;
use App\Models\Sponsors;
use App\Models\Tweets;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    // get all sponsors
    public function index()
    {
        $sponsors = Sponsors::all();

        return response()->json($sponsors);
    }
    // get by id sponsors
    public function show($id)
    {
        $sponsors  = Sponsors::find($id);

        if (!$sponsors ) {
            return response()->json(['message' => 'Sponsors not found'], 404);
        }

        return response()->json($sponsors );
    }
    public function createSponsors(Request $request)
    {
        $sponsors= Sponsors::create($request->all());
        return response($sponsors,201);
    }

    //supprimer sponsors
    public function deleteSponsors(Request $request,$id)
    {
        $sponsors = Sponsors::find($id);

        if (is_null($sponsors)) {
            return response()->json(['message' => '$sponsors not found'], 404);
        }

        $sponsors->delete();
        return response()->json(['message' => '$sponsors deleted successfully']);
    }

    //create sponsors

    public function create(Request $request)
    {
        $sponsors= Sponsors::create($request->all());
        return response($sponsors,201);

    }

    //update Sponsors
    public function updateSponsors(Request $request,$id){
        $sponsors= Sponsors::find($id);
        if(is_null($sponsors)){
            return response()->json(['message' => 'Sponsors not fond'],404);
        }
        $sponsors->update($request->all());
        return response($sponsors,200);
    }

}
