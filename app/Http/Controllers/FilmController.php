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
        $actors = Actor::all();
        $genres = Genre::all();

        return view('films.create', compact('genres', 'actors'));
    }

    public function editForm(Film $film)
    {
        $actors = Actor::all();
        $genres = Genre::all();

        return view('films.edit', compact('film', 'actors', 'genres'));
    }

    public function delete(Film $film)
    {
        $this->filmService->delete($film);
        session()->flash('success', 'Success!');
        return redirect()->route('film.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $user = $request->user();
        $film = $this->filmService->create($data, $user);

        session()->flash('success', 'Success!');
        return redirect()->route('film.show', ['film' => $film->id]);
    }

    public function edit(Film $film, EditRequest $request)
    {
        $data = $request->validated();
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
        return view('films.show', compact('film'));
    }

}

