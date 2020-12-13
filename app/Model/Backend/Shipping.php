<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
     protected $fillable = [
        'shipping_type', 'shipping_description', 'shipping_price', 'shipping_status',
    ];
}
