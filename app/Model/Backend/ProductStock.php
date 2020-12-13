<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    protected $fillable = [
        'product_id', 'unit_price', 'purchase_price', 'tax', 'discount', 'stock_quantity',
    ];
}
