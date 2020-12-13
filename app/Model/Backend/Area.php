<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $fillable = [
    	'region_id', 'city_id', 'name'
    ];

     public function regionForArea()
    {
    	return $this->belongsTo('App\Model\Backend\Region', 'region_id');
    }

    public function cityForArea()
    {
    	return $this->belongsTo('App\Model\Backend\City', 'city_id');
    }
}
