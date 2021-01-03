<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id','order_no','total_count','total_price','shipping_charge','order_status','order_tracking'];
}
