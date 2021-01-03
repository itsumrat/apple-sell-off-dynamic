<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['product_id', 'ram_id','hard_drive_id', 'graphics_card_id','processor_id', 'price', 'quantity',];
}
