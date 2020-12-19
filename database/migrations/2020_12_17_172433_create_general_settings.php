<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tech_support_email');
            $table->string('tech_support_phone');
            $table->string('cus_support_email');
            $table->string('cus_support_phone');
            $table->string('email');
            $table->text('address');
            $table->text('support_title');
            $table->text('support_description');
            $table->text('privacy_policy');
            $table->text('acceptable_communication');
            $table->text('acceptable_use');
            $table->text('cookie');
            $table->text('warranty_and_return');
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
        Schema::dropIfExists('general_settings');
    }
}
