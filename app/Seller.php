<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public function order()
    {
        return $this->hasOne('App\Order', 'order_id');
    }
}
