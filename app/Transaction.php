<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
      'transactionType','product_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
