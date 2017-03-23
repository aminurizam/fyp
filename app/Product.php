<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name','price','transactionType','category','detail','image'
    ];
    public function transaction()
    {
    	return $this->hasOne(Transaction::class, 'transaction_id');
    }
}
