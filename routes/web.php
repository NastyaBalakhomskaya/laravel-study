<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactUsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])
    ->name('home');

Route::get('/about', [AboutUsController::class, 'show'])
    ->name('about');

Route::get('/contact', [ContactUsController::class, 'show'])
    ->name('contact');

Route::post('/contact', [ContactUsController::class, 'store'])
    ->name('contact.store');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/films/create', [FilmController::class, 'createForm'])
        ->name('film.create.form');

    Route::post('/films/create', [FilmController::class, 'create'])
        ->name('film.create');

    Route::get('/films', [FilmController::class, 'list'])
        ->name('film.list');

    Route::get('/films/{film}', [FilmController::class, 'show'])
        ->name('film.show');

    Route::get('/films/{film}/edit', [FilmController::class, 'editForm'])
        ->name('film.edit.form');

    Route::post('/films/{film}/edit', [FilmController::class, 'edit'])
        ->name('film.edit');

    Route::post('/films/{film}/delete', [FilmController::class, 'delete'])
        ->name('film.delete');

    Route::get('/actors/create', [ActorController::class, 'createForm'])
        ->name('actor.create.form');

    Route::post('/actors/create', [ActorController::class, 'create'])
        ->name('actor.create');

    Route::get('/actors', [ActorController::class, 'list'])
        ->name('actor.list');

    Route::get('/actors/{actor}', [ActorController::class, 'show'])
        ->name('actor.show');

    Route::get('/actors/{actor}/edit', [ActorController::class, 'editForm'])
        ->name('actor.edit.form');

    Route::post('/actors/{actor}/edit', [ActorController::class, 'edit'])
        ->name('actor.edit');

    Route::post('/actors/{actor}/delete', [ActorController::class, 'delete'])
        ->name('actor.delete');


    Route::get('/genres/create', [GenreController::class, 'createForm'])
        ->name('genre.create.form');

    Route::post('/genres/create', [GenreController::class, 'create'])
        ->name('genre.create');

    Route::get('/genres', [GenreController::class, 'list'])
        ->name('genre.list');

    Route::get('/genres/{genre}', [GenreController::class, 'show'])
        ->name('genre.show');

    Route::get('/genres/{genre}/edit', [GenreController::class, 'editForm'])
        ->name('genre.edit.form');

    Route::post('/genres/{genre}/edit', [GenreController::class, 'edit'])
        ->name('genre.edit');

    Route::post('/genres/{genre}/delete', [GenreController::class, 'delete'])
        ->name('genre.delete');
});

Route::group(['prefix' => '/sign-up'], function () {
    Route::get('', [UserController::class, 'signUpForm'])
        ->name('sign-up.form');

    Route::post('', [UserController::class, 'signUp'])
        ->name('sign-up');
});

Route::get('/verify-email/{id}/{hash}', [UserController::class, 'verifyEmail'])
    ->name('verify.email');


Route::get('/sign-in', [AuthController::class, 'signInForm'])
    ->name('login');

Route::post('/sign-in', [AuthController::class, 'signIn'])
    ->name('sign-in');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
