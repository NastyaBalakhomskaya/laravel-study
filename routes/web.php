<?php

use App\Http\Controllers\FilmController;
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



