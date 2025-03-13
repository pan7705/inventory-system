<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name',
    ];

    public function color(){
        return $this->belongsTo(Color::class);
    }
}
