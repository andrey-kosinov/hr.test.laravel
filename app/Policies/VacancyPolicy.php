<?php

namespace App\Policies;

use App\User;
use App\Vacancy;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacancyPolicy
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

    public function destroy(User $user, Vacancy $vacancy)
    {
        return ($user->id === $vacancy->user_id || $user->role == 1);
    }

    public function approve(User $user, Vacancy $vacancy)
    {
        return $user->role === 1;
    }

}
