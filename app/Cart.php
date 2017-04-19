<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //table info
    /*protected $table = 'carts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
      'subtotal','total'
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }*/

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

//    public function remove($id)
//    {
//        $this->items[$id]['qty']--;
//        $this->items[$id]['price'] -= $this->items[$id]['item'];
//        $this->totalQty--;
//        $this->totalPrice -= $this->items[$id]['item']['price'];
//
//    }

}
