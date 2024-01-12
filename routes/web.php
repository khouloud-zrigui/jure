<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php or routes/api.php

use App\Http\Controllers\LinksController;

Route::post('/links', [LinksController::class, 'add']);
Route::put('/links/{id}', [LinksController::class, 'update']);
Route::delete('/links/{id}', [LinksController::class, 'delete']);
Route::get('/links/{id}', [LinksController::class, 'getById']);
Route::get('/links', [LinksController::class, 'getAll']);
Route::get('/links/search', [LinksController::class, 'getByName']);
use App\Http\Controllers\PagesController;

Route::post('/pages', [PagesController::class, 'add']);
Route::put('/pages/{id}', [PagesController::class, 'update']);
Route::delete('/pages/{id}', [PagesController::class, 'delete']);
Route::get('/pages/{id}', [PageController::class, 'getById']);
Route::get('/pages', [PagesController::class, 'getAll']);
// routes/web.php ou routes/api.php

use App\Http\Controllers\VideoController;

Route::post('/videos', [VideoController::class, 'add']);
Route::put('/videos/{id}', [VideoController::class, 'update']);
Route::delete('/videos/{id}', [VideoController::class, 'delete']);
Route::get('/videos/{id}', [VideoController::class, 'getById']);
Route::get('/videos', [VideoController::class, 'getAll']);
Route::put('/videos/{id}/updateOrder', [VideoController::class, 'updateOrder']);
// routes/web.php ou routes/api.php

use App\Http\Controllers\PhotosController;

Route::post('/photos', [PhotosController::class, 'add']);
Route::put('/photos/{id}', [PhotosController::class, 'update']);
Route::delete('/photos/{id}', [PhotosController::class, 'delete']);
Route::get('/photos/{id}', [PhotosController::class, 'getById']);
Route::get('/photos', [PhotosController::class, 'getAll']);
Route::put('/photos/{id}/updateOrder', [PhotoController::class, 'updateOrder']);
