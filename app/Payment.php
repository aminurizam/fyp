<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //

    public function order()
    {
      return $this->belongsTo('App\Order', 'order_id');
    }

    public function receipt()
    {
      return $this->hasOne('App\Receipt', 'receipt_id');
    }
}
