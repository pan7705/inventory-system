<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'Type';

    protected $fillable = [
        'name',
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }
}
