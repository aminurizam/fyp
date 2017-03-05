<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected fillable = [
      'name', 'address', 'phoneNumber',
    ];

    public function order()
    {
      return $this->hasOne('App\Order', 'order_id');
    }

    public function payment()
    {
      return $this->hasOne('App\Payment', 'payment_id');
    }
}
