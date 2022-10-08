<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $query = Film::query()
            ->with(['user', 'genres', 'actors'])
            ->latest();

        if ($request->has('genres')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('genres.id', $request->get('genres'));
            });
        }

        if ($request->has('actors')) {
            $query->whereHas('actors', function ($q) use ($request) {
                $q->whereIn('actors.id', $request->get('actors'));
            });
        }

        if ($request->has('title')) {
            $search = '%' . $request->get('title') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', $search);
            });
        }

        if ($request->has('year')) {
            $search = '%' . $request->get('year') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('year', 'like', $search);
            });
        }

        $films = $query
            ->paginate(2)
            ->appends($request->query());

        $genres = Genre::all();
        $actors = Actor::all();

        return view('home', compact('films', 'genres', 'actors'));
    }
}
