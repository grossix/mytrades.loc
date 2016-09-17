<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [];

    public function sales() {
        return $this->belongsToMany('App\Sale');
    }
}
