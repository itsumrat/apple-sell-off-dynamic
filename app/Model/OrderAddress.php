<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable = ['order_id','name','phone','email','address','bname','bphone','bemail','bregion_id','bcity_id','barea_id','baddress','sname','sphone','semail','sregion_id','scity_id','sarea_id','saddress'];
}
