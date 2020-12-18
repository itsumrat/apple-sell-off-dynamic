<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class FaqsSetting extends Model
{
    protected $fillable = ['faqs_category_id', 'title', 'description'];

    public function validation() {
        return [
            'faqs_category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function faqs_category () {
        return $this->belongsTo('App\Model\Backend\FaqsCategory', 'faqs_category_id', 'id');
    }
}
