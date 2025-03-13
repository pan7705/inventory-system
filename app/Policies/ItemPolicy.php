<?php

namespace App\Policies;

use App\Models\User;

class ItemPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(user $user, Item $item)
    {
        return $user->id === $item->user_id;
    }
}
