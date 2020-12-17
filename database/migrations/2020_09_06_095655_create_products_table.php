<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('product_type_id')->nullable();
            $table->integer('main_category_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->integer('processor_id')->nullable();
            $table->integer('ram_id')->nullable();
            $table->integer('harddrive_id')->nullable();
            $table->integer('graphicscard_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('stock_status')->nullable();
            $table->integer('condition')->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('year')->nullable();
            $table->tinyInteger('is_suggestable')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->text('tag')->nullable();
            $table->text('product_description')->nullable();
            $table->text('product_specification')->nullable();
            $table->string('feature_image')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('products');
    }
}
