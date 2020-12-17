<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    protected $fillable = ['first_sect_heading_1', 'first_sect_heading_2', 'first_sect_heading_3', 'first_sect_heading_4', 'first_sect_title_1', 'first_sect_title_2', 'first_sect_title_3', 'first_sect_title_4', 'third_sec_heading', 'third_sec_title', 'four_sec_main_heading', 'four_sec_main_title', 'four_sect_title_1', 'four_sect_title_2', 'four_sect_title_3', 'four_sect_title_3', 'four_sect_title_3', 'first_sec_image_1', 'first_sec_image_2', 'first_sec_image_3', 'first_sec_image_4', 'third_sec_image', 'four_sec_image_1', 'four_sec_image_2', 'four_sec_image_3', 'fifth_sec_heading', 'fifth_sec_title', 'fifth_sec_image', 'instagram_url', 'facebook_url', 'twitter_url', 'pinterest_url'];

    public function validation() {
        return [
            'first_sect_heading_1' => 'required',
            'first_sect_heading_2' => 'required',
            'first_sect_heading_3' => 'required',
            'first_sect_heading_4' => 'required',
            'first_sect_title_1' => 'required',
            'first_sect_title_2' => 'required',
            'first_sect_title_3' => 'required',
            'first_sect_title_4' => 'required',
            'third_sec_heading' => 'required',
            'third_sec_title' => 'required',
            'four_sec_main_heading' => 'required',
            'four_sec_main_title' => 'required',
            'four_sect_title_1' => 'required',
            'four_sect_title_2' => 'required',
            'four_sect_title_3' => 'required',
            'four_sect_title_3' => 'required',
            'four_sect_title_3' => 'required',
            'first_sec_image_1' => 'required',
            'first_sec_image_2' => 'required',
            'first_sec_image_3' => 'required',
            'first_sec_image_4' => 'required',
            'third_sec_image' => 'required',
            'four_sec_image_1' => 'required',
            'four_sec_image_2' => 'required',
            'four_sec_image_3' => 'required',
        ];
    }
}
