<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $fillable = [
        'mc_name', 'mc_description', 'mc_type', 'mc_icon', 'mcoverimage', 'mc_slug',
    ];

    public function subcategory()
    {
        return $this->hasMany('App\Model\Backend\SubCategory', 'main_category_id');
    }

    public function product() {
        return $this->hasMany('App\Model\Backend\Product', 'main_category_id')->take(4);
    }
}
