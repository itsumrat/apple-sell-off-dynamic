<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'order_no', 'total_count', 'total_price', 'order_status', 'order_tracking', 'shipping_charge',
    ];

    public function orderItems()
    {
    	return $this->hasMany('App\Model\Backend\OrderItem', 'order_id', 'id');
    }

    public function orderOwner()
    {
    	return $this->belongsTo('App\User', 'customer_id', 'id');
    }
}
