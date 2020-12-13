<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_name', 'brand_description', 'brand_icon', 'brand_slug',
    ];
}
