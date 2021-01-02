<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['country_id', 'name', 'status'];

    public function validation() {
        return [
            'country_id' => 'required',
            'name' => 'required',
        ];
    }

    public function districts() {
        return $this->hasMany('App\Model\District', 'division_id');
    }
}
