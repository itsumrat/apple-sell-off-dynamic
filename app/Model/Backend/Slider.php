<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'slider_title', 'slider_description', 'slider_url', 'slider_img', 'status',
    ];

}
