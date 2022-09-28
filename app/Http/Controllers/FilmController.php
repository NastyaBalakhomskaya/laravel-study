<?php

namespace App\Http\Controllers;

use App\Http\Requests\Film\CreateRequest;
use App\Http\Requests\Film\EditRequest;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Zhanr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function createForm()
    {
        //return view('films.create');
        $actors = Actor::all();
        //return view('films.create', compact('actors'));

        $zhanrs = Zhanr::all();
        return view('films.create', compact('zhanrs', 'actors'));
    }

    public function editForm(int $id)
    {
        $film = Film::query()->findOrFail($id);
        $actors = Actor::all();
        $zhanrs = Zhanr::all();
        //return view('films.edit', compact('film'));
        return view('films.edit', compact('film', 'actors', 'zhanrs'));
    }

    public function delete(int $id)
    {
        $film = Film::query()->findOrFail($id)->delete();
        return redirect()->route('film.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $film = new Film($data);
        $user = $request->user();
        $film->user()->associate($user);
        $film->save();
        $film->actors()->attach($data['actors']);
        $film->zhanrs()->attach($data['zhanrs']);

        session()->flash('success', 'Success!');
        return redirect()->route('film.show', ['id' => $film->id]);
    }

    public function edit(int $id, EditRequest $request)
    {
        $film = Film::query()->findOrFail($id);
        $data = $request->validated();
        $film->fill($data);
        $film->actors()->sync($data['actors']);
        $film->zhanrs()->sync($data['zhanrs']);
        $film->save();

        session()->flash('success', 'Success!');
        return redirect()->route('film.show', ['id' => $film->id]);
    }

    public function list()
    {
        // $films = Film::all(); для отображения списка без пагинации
        $films = Film::paginate(5);

        return view('films.list', ['films' => $films]);
    }

    public function show(int $id)
    {
        $film = Film::query()->findOrFail($id);

        return view('films.show', compact('film'));
    }

}

