<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\SponsorsController;
use App\Http\Controllers\OrganizersController;
use App\Http\Controllers\KeynotespeakersController;
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
Route::get('/', function () {
    return ('welcome');
});
//TWEETS
Route::post('/tweets', [TweetController::class, 'store']);
Route::get('/tweets', [TweetController::class, 'index']);
Route::get('/tweets/{id}', [TweetController::class, 'show']);
Route::delete('/tweets/{id}', [TweetController::class, 'destroy']);

//sponsors
Route::get('/sponsors', [SponsorsController::class, 'index']);
Route::get('/sponsors/{id}', [SponsorsController::class, 'show']);
Route::post('/sponsors', [SponsorsController::class, 'store']);



//Organizers
Route::get('/organizers', [OrganizersController::class, 'index']);
Route::get('/organizers/{id}', [OrganizersController::class, 'show']);
//KEYNOTESPEAKERS
Route::get('/keynotespeakers', [KeynotespeakersController::class, 'index']);
Route::get('/keynotespeakers/{id}', [KeynotespeakersController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
