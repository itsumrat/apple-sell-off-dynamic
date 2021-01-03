<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained('orders', 'id')->onDelete('cascade');

            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('address');

            $table->string('bname')->nullable();
            $table->string('bphone')->nullable();
            $table->string('bemail')->nullable();
            $table->integer('bregion_id')->nullable();
            $table->integer('bcity_id')->nullable();
            $table->integer('barea_id')->nullable();
            $table->text('baddress')->nullable();

            $table->string('sname')->nullable();
            $table->string('sphone')->nullable();
            $table->string('semail')->nullable();
            $table->integer('sregion_id')->nullable();
            $table->integer('scity_id')->nullable();
            $table->integer('sarea_id')->nullable();
            $table->text('saddress')->nullable();

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
        Schema::dropIfExists('order_addresses');
    }
}
