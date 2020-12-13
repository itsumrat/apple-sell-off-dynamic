<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'main_category_id', 'sc_name', 'sc_description', 'sc_type', 'sc_slug', 'mcoverimage',
    ];

    public function mainCategoryForSub()
    {
    	return $this->belongsTo('App\Model\Backend\MainCategory', 'main_category_id');
    }

    public function childcategory()
    {
        return $this->hasMany('App\Model\Backend\ChildCategory', 'sub_category_id');
    }
}
