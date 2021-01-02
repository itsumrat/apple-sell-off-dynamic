<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = [
        'customer_id', 'bname', 'bphone', 'bemail', 'bregion_id', 'bcity_id', 'barea_id', 'baddress', 'sname', 'sphone', 'semail', 'sregion_id', 'scity_id', 'sarea_id', 'saddress', 'status',
    ];

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
        return $this->belongsTo('App\Model\Country', 'bregion_id', 'id');
    }

    public function shipping_division() {
        return $this->belongsTo('App\Model\Division', 'bcity_id', 'id');
    }

    public function shipping_district() {
        return $this->belongsTo('App\Model\District', 'barea_id', 'id');
    }
}
