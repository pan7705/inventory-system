<?php

namespace App\Policies;

use App\Models\User;

class TypePolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(user $user, Type $type)
    {
        return $user->id === $type->user_id;
    }
}
