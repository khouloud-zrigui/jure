<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\SessionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('authors', [AuthorsController::class,'index']);
Route::post('authors',[AuthorsController::class, 'store']);
Route::put('authors/edit/{id}',[AuthorsController::class, 'edit']);
Route::delete('authors/delete/{id}',[AuthorsController::class, 'delete']);
Route::get('authors/{id}',[AuthorsController::class,'getAuthorsById']);
Route::get('authors/{lastname}',[AuthorsController::class,'getAuthorsByLastname']);

Route::get('countries', [CountriesController::class,'index']);
Route::post('countries',[CountriesController::class, 'store']);
Route::put('countries/edit/{id}',[CountriesController::class, 'edit']);
Route::delete('countries/delete/{id}',[CountriesController::class, 'delete']);
Route::get('countries/{id}',[CountriesController::class,'getCountriesById']);
Route::get('countries/{name}',[CountriesController::class,'getCountriesByName']);



Route::get('session', [SessionController::class,'index']);
Route::post('session',[SessionController::class, 'store']);
Route::put('session/edit/{id}',[SessionController::class, 'edit']);
Route::delete('session/delete/{id}',[SessionController::class, 'delete']);
Route::get('session/{id}',[SessionController::class,'getSessionById']);
Route::get('session/{title}',[SessionController::class,'getSessionByTitle']);
Route::get('session/orderBy',[SessionController::class,'orderBy']);