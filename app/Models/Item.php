<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name',
        'quantity',
        'color_id',
        'type_id',
    ];

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
