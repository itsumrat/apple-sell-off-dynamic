<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name', 'product_type_id', 'main_category_id', 'size_id', 'processor_id', 'ram_id', 'harddrive_id', 'graphicscard_id', 'color_id', 'stock_status', 'condition', 'year', 'is_suggestable', 'create_user', 'update_user', 'brand_id', 'slug', 'tag', 'product_description', 'product_specification', 'feature_image', 'status',
    ];

    public function mainCategory()
    {
    	return $this->hasOne('App\Model\Backend\MainCategory', 'id', 'main_category_id');
    }


    public function proSize()
    {
        return $this->hasOne('App\Model\Backend\Size', 'id', 'size_id');
    }
   public function proProcessor()
    {
        return $this->hasOne('App\Model\Backend\Processor', 'id', 'processor_id');
    }
   public function proRam()
    {
        return $this->hasOne('App\Model\Backend\Ram', 'id', 'ram_id');
    }
   public function proHarddrive()
    {
        return $this->hasOne('App\Model\Backend\HardDrive', 'id', 'harddrive_id');
    }
   public function proGraphicscard()
    {
        return $this->hasOne('App\Model\Backend\GraphicsCard', 'id', 'graphicscard_id');
    }
   public function proColor()
    {
        return $this->hasOne('App\Model\Backend\Color', 'id', 'color_id');
    }

    public function stockProduct()
    {
    	return $this->hasOne('App\Model\Backend\ProductStock', 'product_id');
    }

    public function stock_product()
    {
        return $this->hasOne('App\Model\Backend\ProductStock', 'product_id');
    }

    public function stockEdit()
    {
        return $this->hasOne('App\Model\Backend\ProductStock', 'product_id');
    }

    public function imageGalleryEdit()
    {
    	return $this->hasMany('App\Model\Backend\ImageGallery', 'product_id');
    }

    public function box_item() {
        return $this->hasMany('App\Model\Backend\ProductBoxItem', 'product_id');
    }

    public function additional_ram() {
        return $this->hasMany('App\Model\Backend\ProductAddition', 'product_id')->where('type', 1);
    }

    public function additional_hard_drive() {
        return $this->hasMany('App\Model\Backend\ProductAddition', 'product_id')->where('type', 2);
    }

    public function additional_graphics_card() {
        return $this->hasMany('App\Model\Backend\ProductAddition', 'product_id')->where('type', 3);
    }

    public function additional_processor() {
        return $this->hasMany('App\Model\Backend\ProductAddition', 'product_id')->where('type', 4);
    }
}
