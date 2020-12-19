<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = ['name','tech_support_email','tech_support_phone','cus_support_email','cus_support_phone','email','address','support_title','support_description','privacy_policy','acceptable_communication','acceptable_use','cookie','warranty_and_return'];

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
            'privacy_policy' => 'required',
            'acceptable_communication' => 'required',
            'acceptable_use' => 'required',
            'cookie' => 'required',
            'warranty_and_return' => 'required',
        ];
    }
}
