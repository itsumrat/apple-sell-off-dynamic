<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = [
        'customer_id', 'bname', 'bphone', 'bemail', 'bregion_id', 'bcity_id', 'barea_id', 'baddress', 'sname', 'sphone', 'semail', 'sregion_id', 'scity_id', 'sarea_id', 'saddress', 'status',
    ];
}
