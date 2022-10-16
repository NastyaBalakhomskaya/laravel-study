<?php

namespace App\Observers;


use App\Mail\EditDataFilm;
use App\Models\Film;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class FilmObserver
{
    public function updated(Film $film)
    {
        if ($film->year !== $film->getOriginal('year')) {
            $users = User::all();
            foreach ($users as $user) {
                if ($film->user_id !== $user->id) {
                    Mail::to($user->email)->send(new EditDataFilm($film));
                }
            }
        }
    }
}
