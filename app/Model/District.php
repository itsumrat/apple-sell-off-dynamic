<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['division_id', 'name', 'status'];

    public function validation() {
        return [
            'division_id' => 'required',
            'name' => 'required',
        ];
    }
}
