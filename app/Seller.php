<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public function order()
    {
        return $this->hasOne('App\Order', 'order_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function exchangeCart()
    {
        return $this->hasOne(ExchangeCart::class, 'exchangeCart_id');
    }

    public function freeCart()
    {
        return $this->hasOne(FreeCart::class);
    }
}
