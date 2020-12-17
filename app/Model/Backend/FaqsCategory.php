<?php

namespace App\Model\Backend;

use FontLib\Table\Type\name;
use Illuminate\Database\Eloquent\Model;

class FaqsCategory extends Model
{
    protected $fillable = ['name', 'status'];

    public function validation() {
        return [
            'name' => 'required'
        ];
    }
}
