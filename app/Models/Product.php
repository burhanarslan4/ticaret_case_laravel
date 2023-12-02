<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'category',
    ];
    // İlişkiler buraya eklenir, örneğin:
    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
}

