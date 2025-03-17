<?php

namespace App\Observers;

use App\Models\Type;
use Illuminate\Support\Str;

class TypeObserver
{
    public function creating(Type $type)
    {
        $type->uuid = Str::uuid();
    }
}
