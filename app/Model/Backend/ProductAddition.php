<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductAddition extends Model
{
    protected $table = 'product_additions';
    protected $fillable = ['product_id', 'type', 'addition_id', 'price'];

    public function ram() {
        return $this->belongsTo('App\Model\Backend\Ram','addition_id', 'id');
    }

    public function hard_drive() {
        return $this->belongsTo('App\Model\Backend\HardDrive','addition_id', 'id');
    }

    public function graphics_card() {
        return $this->belongsTo('App\Model\Backend\GraphicsCard','addition_id', 'id');
    }

    public function processor() {
        return $this->belongsTo('App\Model\Backend\Processor','addition_id', 'id');
    }
}
