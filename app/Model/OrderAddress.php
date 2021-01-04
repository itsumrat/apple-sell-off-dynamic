<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $table = 'order_addresses';
    protected $primaryKey = 'id';
    protected $fillable = ['order_id','name','phone','email','address','bname','bphone','bemail','bregion_id','bcity_id','barea_id','baddress','sname','sphone','semail','sregion_id','scity_id','sarea_id','saddress'];

    public function billing_country() {
        return $this->belongsTo('App\Model\Country', 'bregion_id', 'id');
    }

    public function billing_division() {
        return $this->belongsTo('App\Model\Division', 'bcity_id', 'id');
    }

    public function billing_district() {
        return $this->belongsTo('App\Model\District', 'barea_id', 'id');
    }

    public function shipping_country() {
        return $this->belongsTo('App\Model\Country', 'sregion_id', 'id');
    }

    public function shipping_division() {
        return $this->belongsTo('App\Model\Division', 'scity_id', 'id');
    }

    public function shipping_district() {
        return $this->belongsTo('App\Model\District', 'sarea_id', 'id');
    }
}
