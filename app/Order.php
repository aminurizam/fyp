<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller', 'seller_id');
    }

    public function payment()
    {
      return $this->hasOne('App\Payment', 'payment_id')->withTimestamps();
    }

    public function exchangeCart()
    {
        return $this->belongsTo(ExchangeCart::class,'exchangeCart_id');
    }
}
