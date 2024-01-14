<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Controllers\Api\LinkController;
Route::get('link',[LinkController::class,'get']);
Route::post('link',[LinkController::class,'add']);
Route::put('link/edit/{id}',[LinkController::class,'update']);
Route::delete('link/delete/{id}',[LinkController::class,'delete']);
Route::get('link/get/{id}',[LinkController::class,'getById']);
Route::get('link/by-href/{href}',[LinkController::class,'getByHref']);

use App\Http\Controllers\Api\pagesController;
Route::get('pages',[pagesController::class,'get']);
Route::post('pages',[pagesController::class,'add']);
Route::put('pages/edit/{id}',[pagesController::class,'update']);
Route::delete('pages/delete/{id}',[pagesController::class,'delete']);