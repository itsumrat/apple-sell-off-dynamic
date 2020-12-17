<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = ['name','tech_support_email','tech_support_phone','cus_support_email','cus_support_phone','email','address','support_title','support_description'];

    public function validation() {
        return [
            'name' => 'required',
            'tech_support_email' => 'required',
            'tech_support_phone' => 'required',
            'cus_support_email' => 'required',
            'cus_support_phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'support_title' => 'required',
            'support_description' => 'required',
        ];
    }
}
