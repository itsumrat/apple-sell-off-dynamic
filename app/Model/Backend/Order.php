<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'order_no', 'total_count', 'total_price', 'order_status', 'order_tracking', 'shipping_charge'];

    public function orderItems() {
    	return $this->hasMany('App\Model\OrderProduct', 'order_id');
    }

    public function orderOwner() {
    	return $this->belongsTo('App\Model\Backend\Customer', 'customer_id', 'id');
    }

    public function address() {
        return $this->hasOne('App\Model\OrderAddress', 'order_id');
    }
}
