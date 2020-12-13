<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->biginteger('customer_id')->nullable();
            $table->string('bname')->nullable();
            $table->string('bphone')->nullable();
            $table->string('bemail')->nullable();
            $table->integer('bregion_id')->nullable();
            $table->integer('bcity_id')->nullable();
            $table->integer('barea_id')->nullable();
            $table->string('baddress')->nullable();
            $table->string('sname')->nullable();
            $table->string('sphone')->nullable();
            $table->string('semail')->nullable();
            $table->integer('sregion_id')->nullable();
            $table->integer('scity_id')->nullable();
            $table->integer('sarea_id')->nullable();
            $table->string('saddress')->nullable();
            $table->string('mobile')->nullable();
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
        Schema::dropIfExists('customer_addresses');
    }
}
