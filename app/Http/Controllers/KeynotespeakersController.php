<?php

namespace App\Http\Controllers;

use App\Models\Keynotespeakers;
use App\Models\Keynotesspeakers;
use Illuminate\Http\Request;

class KeynotespeakersController extends Controller
{
    public function index()
    {
        $keynotespeakers = Keynotespeakers::all();

        return response()->json($keynotespeakers);
    }
    public function show($id)
    {
        $keynotespeakers   = Keynotespeakers::find($id);

        if (!$keynotespeakers  ) {
            return response()->json(['message' => 'Keynotespeakers not found'], 404);
        }

        return response()->json($keynotespeakers  );
    }
}
