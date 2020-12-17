<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('first_sec_image_1');
            $table->string('first_sec_image_2');
            $table->string('first_sec_image_3');
            $table->string('first_sec_image_4');

            $table->string('first_sect_heading_1');
            $table->string('first_sect_heading_2');
            $table->string('first_sect_heading_3');
            $table->string('first_sect_heading_4');

            $table->string('first_sect_title_1');
            $table->string('first_sect_title_2');
            $table->string('first_sect_title_3');
            $table->string('first_sect_title_4');

            $table->string('third_sec_heading');
            $table->string('third_sec_title');
            $table->string('third_sec_image');

            $table->string('four_sec_main_heading');
            $table->text('four_sec_main_title');

            $table->string('four_sec_image_1');
            $table->string('four_sec_image_2');
            $table->string('four_sec_image_3');

            $table->string('four_sect_title_1');
            $table->string('four_sect_title_2');
            $table->string('four_sect_title_3');

            $table->string('fifth_sec_heading');
            $table->text('fifth_sec_title');
            $table->string('fifth_sec_image');

            $table->string('instagram_url');
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('pinterest_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_page_settings');
    }
}
