<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['keys', 'money', 'description'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
