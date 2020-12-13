<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = [
    	'region_id', 'name', 'shipping_rate'
    ];

    public function regionForCity()
    {
    	return $this->belongsTo('App\Model\Backend\Region', 'region_id');
    }
}
