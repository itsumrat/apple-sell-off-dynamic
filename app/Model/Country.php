<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'status'];

    public function validation() {
        return [
            'name' => 'required',
        ];
    }

    public function divisions() {
        return $this->hasMany('App\Model\Division', 'country_id');
    }
}
