<?php

namespace App\Http\Controllers\Api;
use App\Models\Countries;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountriesController extends Controller
{ //get all countires de la base de données.
    public function index(){

        $countries = Countries::all();
        $data =[
            'status'=> 200,
            'countries' => $countries
        ];
        return response()->json($data,200);
        
    }
}
