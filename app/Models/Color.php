<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    protected $fillable = [
        'name',
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }
}
