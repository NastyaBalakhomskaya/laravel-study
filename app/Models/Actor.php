<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'otchestvo',
        'date_rozh',
        'height',
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'actor_films');
    }
}
