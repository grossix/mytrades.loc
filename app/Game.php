<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['gameid', 'name', 'image'];

    public function sales() {
        return $this->hasMany('App\Sale');
    }

//    public function getRouteKeyName() {
//        return 'gameid';
//    }
}
