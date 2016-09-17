<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $fillable = ['description', 'profit'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
