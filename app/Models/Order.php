<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'total_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function invoice()
{
    return $this->hasOne(Invoice::class);
}
}
