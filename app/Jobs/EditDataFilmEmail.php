<?php

namespace App\Jobs;

use App\Mail\EditDataFilm;
use App\Models\Film;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EditDataFilmEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Film $film): void
    {
        $users = User::all();
        foreach ($users as $user) {
            if ($film->user_id !== $user->id) {
                Mail::to($user->email)->send(new EditDataFilm($film));
            }
        }
    }
}
