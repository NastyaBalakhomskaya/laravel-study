<?php

namespace App\Policies;

use App\Models\Film;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilmPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public
    function create(User $user): bool {
        return $user->role === 'admin';
        //  return  true;
    }

    public
    function edit(User $user,Film $film): bool {
        return $user->id === $film->user_id;
    }

    public
    function delete(User $user,Film $film): bool {
        return $user->id === $film->user_id;
    }

}
