<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Film;
use App\Models\User;

class FilmService
{
    public function create(array $data, User $user): Film
    {
        $film = new Film($data);
        $film->user()->associate($user);
        $film->save();
        $film->actors()->attach($data['actors']);
        $film->genres()->attach($data['genres']);

        return $film;
    }

    public function edit(Film $film, array $data): void
    {
        $film->fill($data);
        $film->actors()->sync($data['actors']);
        $film->genres()->sync($data['genres']);
        $film->save();
    }

    public function delete(Film $film): void
    {
        $film->delete();
    }
}
