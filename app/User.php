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

    public function roleCheck($role = null){

        if ($role){
            return $this->userRole == $role; //userRole kena sama dengan dalam database
        }

        return $this->role;
    }

    public function buyer() {
      return $this->hasOne(Buyer::class, 'user_id');
    }

    public function seller(){
      return $this->hasOne(Seller::class, 'user_id');
    }

}
