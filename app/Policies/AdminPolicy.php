<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function access(User $user)
    {
        return ($user
            ? Response::allow()
            : Response::deny("You don't have access to this page"));
    }
}
