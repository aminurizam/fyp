<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExchangeCart extends Model
{
    protected $fillable = [
        'image','details'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'order_id');
    }
}
