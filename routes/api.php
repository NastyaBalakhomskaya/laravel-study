<?php

use App\Http\Controllers\Api\ActorController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FilmController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/sign-up', [UserController::class, 'signUp']);
Route::post('/sign-in', [AuthController::class, 'signIn']);

Route::get('/films/{film}', [FilmController::class, 'show']);
Route::get('/films', [FilmController::class, 'list']);

Route::group(['prefix' => '/films', 'middleware' => ['auth:api']], function () {
    Route::post('', [FilmController::class, 'create'])->middleware('can:create,' . Film::class);
    Route::put('/{film}', [FilmController::class, 'edit'])->middleware('can:edit,film');
    Route::delete('/{film}', [FilmController::class, 'delete'])->middleware('can:delete,film');
});

Route::get('/actors/{actor}', [ActorController::class, 'show']);
Route::get('/actors', [ActorController::class, 'list']);

Route::group(['prefix' => '/actors', 'middleware' => ['auth:api']], function () {
    Route::post('', [ActorController::class, 'create'])->middleware('can:create,' . Actor::class);
    Route::put('/{actor}', [ActorController::class, 'edit'])->middleware('can:update,actor');
    Route::delete('/{actor}', [ActorController::class, 'delete'])->middleware('can:delete,actor');
});

Route::get('/genres/{genre}', [GenreController::class, 'show']);
Route::get('/genres', [GenreController::class, 'list']);

Route::group(['prefix' => '/genres', 'middleware' => ['auth:api']], function () {
    Route::post('', [GenreController::class, 'create'])->middleware('can:create,' . Genre::class);
    Route::put('/{genre}', [GenreController::class, 'edit'])->middleware('can:update,genre');
    Route::delete('/{genre}', [GenreController::class, 'delete'])->middleware('can:delete,genre');
});
