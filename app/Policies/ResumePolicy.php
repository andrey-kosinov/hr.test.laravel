<?php

namespace App\Policies;

use App\User;
use App\Resume;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResumePolicy
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

    public function destroy(User $user, Resume $resume)
    {
        return $user->id === $resume->user_id;
    }

}
