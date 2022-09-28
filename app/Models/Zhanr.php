<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zhanr extends Model
{
    use HasFactory;

    protected $fillable = [
        'nazvanie',
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_zhanrs');
    }
}
