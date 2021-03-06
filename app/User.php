<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'matricNo' ,'email', 'password', 'userRole'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roleCheck($role = null)
    {
        if ($role){
            return $this->userRole == $role; //userRole kena sama dengan dalam database
        }

        return $this->role;
    }

    public function buyer()
    {
      return $this->hasOne(Buyer::class);
    }

    public function seller()
    {
      return $this->hasOne(Seller::class, 'seller_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'cart_id');
    }

    public function exchangeCart()
    {
        return $this->hasOne(ExchangeCart::class, 'exchangeCart_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function freeCart()
    {
        return $this->hasOne(FreeCart::class, 'freeCart_id');
    }

}
