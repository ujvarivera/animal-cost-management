<?php

namespace App\Policies;

use App\Models\User;

class BasePolicy
{
    // Logic to determine if the user can create, edit, delete the model
    public function manage(User $user)
    {
        return $user->permissions['manage'];
    }
}
