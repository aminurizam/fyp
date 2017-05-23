<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeCart extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
