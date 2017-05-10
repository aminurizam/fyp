<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected  $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
      'name','price','transactionType','category','detail','image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaction()
    {
    	return $this->hasOne(Transaction::class, 'transaction_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

//    public function productType($type = null)
//    {
//        if($type){
//
//        }
//    }

    public function exchangeCart()
    {
        return $this->hasOne(ExchangeCart::class, 'exchangeCart_id');
    }
}
