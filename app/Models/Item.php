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

    public function scopeSearch($query, $search = null)
    {
        $query->when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });

        return $query;
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
