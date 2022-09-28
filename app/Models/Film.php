<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'text',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_films');
    }

    public function zhanrs()
    {
        return $this->belongsToMany(Zhanr::class, 'film_zhanrs');
    }
}
