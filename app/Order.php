<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function buyer()
    {
      return $this->belongsTo('App\Buyer', 'buyer_id')->withTimestamps();
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller', 'seller_id');
    }

    public function payment()
    {
      return $this->hasOne('App\Payment', 'payment_id')->withTimestamps();
    }
}
