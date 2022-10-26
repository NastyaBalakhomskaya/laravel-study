<?php

namespace App\Http\Controllers;

use App\Http\Requests\Film\CreateRequest;
use App\Http\Requests\Film\EditRequest;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use App\Services\FilmService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function __construct(private FilmService $filmService)
    {
    }

    public function createForm()
    {
        //return view('films.create');
        $actors = Actor::all();
        //return view('films.create', compact('actors'));

        $genres = Genre::all();
        return view('films.create', compact('genres', 'actors'));
    }

    public function editForm(Film $film)
    {
        //$film = Film::query()->findOrFail($id);
        $actors = Actor::all();
        $genres = Genre::all();
        //return view('films.edit', compact('film'));
        return view('films.edit', compact('film', 'actors', 'genres'));
    }

    public function delete(Film $film)
    {
        //$film = Film::query()->findOrFail($id)->delete();
        //$film->delete();
        $this->filmService->delete($film);
        session()->flash('success', 'Success!');
        return redirect()->route('film.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        //$film = new Film($data);
        $user = $request->user();
        //$film->user()->associate($user);
        //$film->save();
        //$film->actors()->attach($data['actors']);
        //$film->genres()->attach($data['genres']);
        $film = $this->filmService->create($data, $user);

        session()->flash('success', 'Success!');
        return redirect()->route('film.show', ['film' => $film->id]);
    }

    public function edit(Film $film, EditRequest $request)
    {
        //$film = Film::query()->findOrFail($id);
        $data = $request->validated();
        //$film->fill($data);
        //$film->actors()->sync($data['actors']);
        //$film->genres()->sync($data['genres']);
        //$film->save();
        $this->filmService->edit($film, $data);

        session()->flash('success', 'Success!');
        return redirect()->route('film.show', ['film' => $film->id]);
    }


    public function list(Request $request)
    {
        $films = Film::query()->with(['user'])->paginate(3);

        return view('films.list', ['films' => $films]);
    }


    public function show(Film $film)
    {
        //$film = Film::query()->findOrFail($id);
        return view('films.show', compact('film'));
    }

}

