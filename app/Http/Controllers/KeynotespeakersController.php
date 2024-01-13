<?php

namespace App\Http\Controllers;

use App\Models\Keynotespeakers;
use App\Models\Organizers;
use Illuminate\Http\Request;
class KeynotespeakersController extends Controller
{

    // get all keynotespeakers
    public function index()
    {
        $keynotespeakers = Keynotespeakers::all();

        return response()->json($keynotespeakers);
    }

    //get by id keynotespeakers
    public function show($id)
    {
        $keynotespeakers   = Keynotespeakers::find($id);

        if (!$keynotespeakers  ) {
            return response()->json(['message' => 'Keynotespeakers not found'], 404);
        }

        return response()->json($keynotespeakers  );
    }

    // create keynotespeakers

    public function create(Request $request)
    {
        $keynote= Keynotespeakers::create($request->all());
        return response($keynote,201);

    }

    // delete keynotespeakers
    public function deleteKeynotespeakers(Request $request,$id)
    {
        $keynotespeakers = Keynotespeakers::find($id);

        if (is_null($keynotespeakers)) {
            return response()->json(['message' => '$keynotespeakers not found'], 404);
        }

        $keynotespeakers->delete();
        return response()->json(['message' => '$keynotespeakersdeleted successfully']);
    }

    //update keynotespeakers
    public function updateKeynotespeakers(Request $request,$id){
        $keynotespeakers= Keynotespeakers::find($id);
        if(is_null($keynotespeakers)){
            return response()->json(['message' => 'keynotespeakers not fond'],404);
        }
        $keynotespeakers->update($request->all());
        return response($keynotespeakers,200);
    }
}
