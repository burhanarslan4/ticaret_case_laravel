<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['order_id', 'user_id', 'amount', 'paid_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
