<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorsController;
use App\Http\Controllers\Api\CountriesController;


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

Route::get('authors', [AuthorsController::class,'index']);
Route::post('authors',[AuthorsController::class, 'add']);
Route::put('authors/edit/{id}',[AuthorsController::class,'edit']);
Route::delete('authors/delete/{id}',[AuthorsController::class,'delete']);
Route::get('authors/{id}',[AuthorsController::class,'getAuthorsById']);
Route::get('authors/by_last_name/{lastname}',[AuthorsController::class,'getAuthorsByLastname']);

Route::get('countries', [CountriesController::class,'index']);