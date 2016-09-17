<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['profit', 'description', 'game_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function game() {
        return $this->belongsTo('App\Game');
    }

    public function card() {
        return $this->hasOne('App\Card');
    }

    public function scopeForGame($builder, $game) {
        if($game->exists) {
            return $builder->where('game_id', $game->id);
        }

        return $builder;
    }
}
