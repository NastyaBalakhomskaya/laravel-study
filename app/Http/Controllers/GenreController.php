<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\CreateRequest;
use App\Http\Requests\Genre\EditRequest;
use App\Models\Genre;
use App\Services\GenreService;


class GenreController extends Controller
{
    public function __construct(private GenreService $genreService)
    {
    }

    public function createForm()
    {
        return view('genres.create');
    }

    public function editForm(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function delete(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genre.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $genre = $this->genreService->create($data);

        session()->flash('success', 'Success!');
        return redirect()->route('genre.show', ['genre' => $genre->id]);
    }

    public function edit(Genre $genre, EditRequest $request)
    {
        $data = $request->validated();
        $this->genreService->edit($genre, $data);

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
        return view('genres.show', compact('genre'));
    }

}
