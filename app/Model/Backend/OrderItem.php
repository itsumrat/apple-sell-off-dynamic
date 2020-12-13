<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'order_no', 'product_id', 'count', 'unit_price', 'sub_price', 'order_item_status',
    ];

    public function proName()
    {
    	return $this->belongsTo('App\Model\Backend\Product', 'product_id', 'id');
    }
}
