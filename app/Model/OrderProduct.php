<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['product_id', 'ram_id','hard_drive_id', 'graphics_card_id','processor_id', 'price', 'quantity',];

    public function product() {
        return $this->belongsTo('App\Model\Backend\Product', 'product_id', 'id');
    }

    public function ram() {
        return $this->belongsTo('App\Model\Backend\Ram', 'ram_id', 'id');
    }

    public function hard_drive() {
        return $this->belongsTo('App\Model\Backend\HardDrive', 'hard_drive_id', 'id');
    }

    public function graphics_card() {
        return $this->belongsTo('App\Model\Backend\GraphicsCard', 'graphics_card_id', 'id');
    }

    public function processor() {
        return $this->belongsTo('App\Model\Backend\Processor', 'processor_id', 'id');
    }
}
