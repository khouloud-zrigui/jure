<?php

namespace App\Http\Controllers\Api;
use App\Models\Specialsessions;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecialsessionsController extends Controller
{
    //get all Special sessions de la base de données.
    public function index(){

        $session = Specialsessions::all();
        $data =[
            'status'=> 200,
            'Session' => $session
        ];
        return response()->json($data,200);
        
    }
}
