<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //

    }
    public function owner(User $user): Response
    {
        return ($user->role=='owner'
            ? Response::allow()
            : Response::deny('You must be a owner'));
    }

    public function staff(User $user): Response
    {
        return ($user->role=='staff'
            ? Response::allow()
            : Response::deny('You must be a staff'));
    }
    public function pembeli(User $user): Response
    {
        return ($user->role=='pembeli'
            ? Response::allow()
            : Response::deny('You must be a pembeli'));
    }
}
