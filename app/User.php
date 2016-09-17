<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'defkeys', 'keys', 'defmoney', 'money'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function trades() {
        return $this->hasMany('App\Trade');
    }

    public function sales() {
        return $this->hasMany('App\Sale');
    }

    public function bonuses() {
        return $this->hasMany('App\Bonus');
    }

    public function reports() {
        return $this->hasMany('App\Report');
    }
}
