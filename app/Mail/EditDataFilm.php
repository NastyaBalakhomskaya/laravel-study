<?php

namespace App\Mail;


use App\Models\Film;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EditDataFilm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private Film $film)
    {
        //
    }

    public function build()
    {
        return $this->subject('Film edit')
            ->view('emails.edit_film', ['title' => $this->film->title]);

    }
}
