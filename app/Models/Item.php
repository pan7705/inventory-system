<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    protected $fillable = [
        'name',
    ];

    public function color(){
        return $this->belongsTo(Color::class);
    }
}
