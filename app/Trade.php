<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = ['item_id', 'profit'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function item() {
        return $this->belongsTo('App\Item');
    }

    public function getItemListAttribute() {
        return $this->item->lists('id')->toArray();
    }

    public function scopeForItem($builder, $item) {
        if($item->exists) {
            return $builder->where('item_id', $item->id);
        }

        return $builder;
    }
}
