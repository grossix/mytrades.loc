<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['condition_id', 'quality_id', 'type_id', 'price', 'keys', 'name', 'link', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trades() {
        return $this->hasMany('App\Trade');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function condition() {
        return $this->belongsTo('App\Condition');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quality() {
        return $this->belongsTo('App\Quality');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function getAbbrConditionAttribute() {
        $conditionWords = preg_split('/( |-)/', $this->condition->name);

        $abbrCondition = '';
        foreach($conditionWords as $conditionWord) {
            $abbrCondition .= strtoupper($conditionWord[0]);
        }

        return $abbrCondition;
    }

    public function getFullLongNameAttribute() {
        $fullLongName = '';
        if($this->stattrak)
            $fullLongName .= 'Stattrak ';
        $fullLongName .= '(' . $this->condition . ')';
        return $fullLongName;
    }

    public function isCase() {
        return $this->type->name == 'Case';
    }

//    public function getFullImageAttribute() {
//        return 'http://steamcommunity-a.akamaihd.net/economy/image/' . $this->image;
//    }

}
