<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZhanrController;
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

    Route::get('/films/{id}', [FilmController::class, 'show'])
        ->name('film.show');

    Route::get('/films/{id}/edit', [FilmController::class, 'editForm'])
        ->name('film.edit.form');

    Route::post('/films/{id}/edit', [FilmController::class, 'edit'])
        ->name('film.edit');

    Route::post('/films/{id}/delete', [FilmController::class, 'delete'])
        ->name('film.delete');

    Route::get('/actors/create', [ActorController::class, 'createForm'])
        ->name('actor.create.form');

    Route::post('/actors/create', [ActorController::class, 'create'])
        ->name('actor.create');

    Route::get('/actors', [ActorController::class, 'list'])
        ->name('actor.list');

    Route::get('/actors/{id}', [ActorController::class, 'show'])
        ->name('actor.show');

    Route::get('/actors/{id}/edit', [ActorController::class, 'editForm'])
        ->name('actor.edit.form');

    Route::post('/actors/{id}/edit', [ActorController::class, 'edit'])
        ->name('actor.edit');

    Route::post('/actors/{id}/delete', [ActorController::class, 'delete'])
        ->name('actor.delete');


    Route::get('/zhanrs/create', [ZhanrController::class, 'createForm'])
        ->name('zhanr.create.form');

    Route::post('/zhanrs/create', [ZhanrController::class, 'create'])
        ->name('zhanr.create');

    Route::get('/zhanrs', [ZhanrController::class, 'list'])
        ->name('zhanr.list');

    Route::get('/zhanrs/{id}', [ZhanrController::class, 'show'])
        ->name('zhanr.show');

    Route::get('/zhanrs/{id}/edit', [ZhanrController::class, 'editForm'])
        ->name('zhanr.edit.form');

    Route::post('/zhanrs/{id}/edit', [ZhanrController::class, 'edit'])
        ->name('zhanr.edit');

    Route::post('/zhanrs/{id}/delete', [ZhanrController::class, 'delete'])
        ->name('zhanr.delete');
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
