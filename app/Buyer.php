<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = [
        'name','address','noPhone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
      return $this->hasOne('App\Order', 'order_id');
    }

    public function payment()
    {
      return $this->hasOne('App\Payment', 'payment_id');
    }
}
