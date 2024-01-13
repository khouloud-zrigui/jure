<?php

namespace App\Http\Controllers;

use App\Models\Organizers;
use Illuminate\Http\Request;

class OrganizersController extends Controller
{
    public function index()
    {
        $organizers = Organizers::all();

        return response()->json($organizers);
    }
    public function show($id)
    {
        $organizers  = Organizers::find($id);

        if (!$organizers ) {
            return response()->json(['message' => 'Organizers not found'], 404);
        }

        return response()->json($organizers );
    }
}
