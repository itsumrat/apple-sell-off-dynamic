<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders', 'id')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products', 'id')->onDelete('cascade');
            $table->foreignId('ram_id')->nullable()->constrained('rams', 'id')->onDelete('cascade');
            $table->foreignId('hard_drive_id')->nullable()->constrained('hard_drives', 'id')->onDelete('cascade');
            $table->foreignId('graphics_card_id')->nullable()->constrained('graphics_cards', 'id')->onDelete('cascade');
            $table->foreignId('processor_id')->nullable()->constrained('processors', 'id')->onDelete('cascade');
            $table->decimal('price');
            $table->integer('quantity');
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
        Schema::dropIfExists('order_products');
    }
}
