<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    public function viewAdmin(User $user)
    {
        return $user->role === 'admin';
    }
}
