<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('main_category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->string('cc_name')->nullable();
            $table->text('cc_description')->nullable();
            $table->integer('cc_type')->nullable();
            $table->string('cc_slug')->nullable();
            $table->string('ccoverimage')->nullable();
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
        Schema::dropIfExists('child_categories');
    }
}
