<?php

namespace App\Http\Controllers;

use App\Models\Sponsors;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    public function index()
    {
        $sponsors = Sponsors::all();

        return response()->json($sponsors);
    }
    public function show($id)
    {
        $sponsors  = Sponsors::find($id);

        if (!$sponsors ) {
            return response()->json(['message' => 'Sponsors not found'], 404);
        }

        return response()->json($sponsors );
    }
    public function store(Request $request)
    {
        $sponsors= Sponsors::create($request->all());
        return response($sponsors,201);
    }


}
