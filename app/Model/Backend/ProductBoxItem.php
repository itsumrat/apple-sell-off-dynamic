<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductBoxItem extends Model
{
    protected  $table = 'product_box_items';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'name', 'image'];
}
