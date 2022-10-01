<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\CreateRequest;
use App\Http\Requests\Genre\EditRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function createForm()
    {
        return view('genres.create');
    }

    public function editForm(Genre $genre)
    {
        //$Genre = Genre::query()->findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    public function delete(Genre $genre)
    {
        //$genre = Genre::query()->findOrFail($id)->delete();
        $genre->delete();
        return redirect()->route('genre.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $genre = new Genre($data);
        $genre->save();

        session()->flash('success', 'Success!');
        return redirect()->route('genre.show', ['genre' => $genre->id]);
    }

    public function edit(Genre $genre, EditRequest $request)
    {
        //$genre = Genre::query()->findOrFail($id);
        $data = $request->validated();
        $genre->fill($data);
        $genre->save();

        session()->flash('success', 'Success!');
        return redirect()->route('genre.show', ['genre' => $genre->id]);
    }

    public function list()
    {
        $genres = Genre::paginate(5);

        return view('genres.list', ['genres' => $genres]);
    }

    public function show(Genre $genre)
    {
        //$genre = Genre::query()->findOrFail($id);

        return view('genres.show', compact('genre'));
    }

}
