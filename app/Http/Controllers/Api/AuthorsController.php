<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Authors;
use Validator;

class AuthorsController extends Controller
{
    public function index(){

        $authors = Authors::all();
        $data =[
            'status'=> 200,
            'authors' => $authors
        ];
        return response()->json($data,200);
        
    }
}
