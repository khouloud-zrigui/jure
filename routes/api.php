<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorsController;
use App\Http\Controllers\Api\CountriesController;
use App\Http\Controllers\Api\SpecialsessionsController;


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
Route::get('pages/get/{id}',[pagesController::class,'getById']);

use App\Http\Controllers\Api\photosController;
Route::get('photos',[photosController::class,'get']);
Route::post('photos',[photosController::class,'add']);
Route::put('photos/edit/{id}',[photosController::class,'update']);
Route::delete('photos/delete/{id}',[photosController::class,'delete']);
Route::get('photos/get/{id}',[photosController::class,'getById']);
Route::get('photos/order-by',[photosController::class,'orderBy']);

use App\Http\Controllers\Api\videosController;
Route::get('videos',[videosController::class,'get']);
Route::post('videos',[videosController::class,'add']);
Route::put('videos/edit/{id}',[videosController::class,'update']);
Route::delete('videos/delete/{id}',[videosController::class,'delete']);
Route::get('videos/get/{id}',[videosController::class,'getById']);
Route::get('videos/order-by',[videosController::class,'orderBy']);



Route::get('authors', [AuthorsController::class,'index']);
Route::post('authors',[AuthorsController::class, 'add']);
Route::put('authors/edit/{id}',[AuthorsController::class,'edit']);
Route::delete('authors/delete/{id}',[AuthorsController::class,'delete']);
Route::get('authors/{id}',[AuthorsController::class,'getAuthorsById']);
Route::get('authors/by_last_name/{lastname}',[AuthorsController::class,'getAuthorsByLastname']);

Route::get('countries', [CountriesController::class,'index']);
Route::post('countries',[CountriesController::class, 'store']);
Route::put('countries/edit/{id}',[CountriesController::class, 'edit']);
Route::delete('countries/delete/{id}',[CountriesController::class, 'delete']);
Route::get('countries/{id}',[CountriesController::class,'getCountriesById']);
Route::get('countries/byname/{name}',[CountriesController::class,'getCountriesByName']);

Route::get('session', [SpecialsessionsController::class,'index']);
Route::post('session',[SpecialsessionsController::class, 'store']);
Route::put('session/edit/{id}',[SpecialsessionsController::class, 'edit']);
Route::delete('session/delete/{id}',[SpecialsessionsController::class, 'delete']);
Route::get('session/get/{id}',[SpecialsessionsController::class,'getSessionById']);
Route::get('session/bytitle/{title}',[SpecialsessionsController::class,'getSessionByTitle']);
Route::get('session/order_By',[SpecialsessionsController::class,'orderBy']);