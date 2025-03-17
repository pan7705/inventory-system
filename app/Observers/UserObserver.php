<?php

namespace App\Observers;

class UserObserver
{
    public function creating(User $user)
    {
        $user->uuid = Str::uuid();
    }
}
