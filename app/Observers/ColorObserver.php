<?php

namespace App\Observers;

use App\Models\Color;
use Illuminate\Support\Str;

class ColorObserver
{
    public function creating(Color $color)
    {
        $color->uuid = Str::uuid();
    }
}
