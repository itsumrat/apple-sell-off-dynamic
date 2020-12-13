<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected $fillable = [
        'main_category_id', 'sub_category_id', 'cc_name', 'cc_description', 'cc_type', 'cc_slug', 'ccoverimage',
    ];

    public function mainCategoryForChild()
    {
    	return $this->belongsTo('App\Model\Backend\MainCategory', 'main_category_id');
    }

    public function subCategoryForChild()
    {
    	return $this->belongsTo('App\Model\Backend\SubCategory', 'sub_category_id');
    }
}
