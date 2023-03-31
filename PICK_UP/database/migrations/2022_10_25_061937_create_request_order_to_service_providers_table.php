<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_order_to_service_providers', function (Blueprint $table) {
            $table->increments('id');
       
            $table->string('productname');
            $table->string('quantity');
            $table->string('productdetails');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            

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
        Schema::dropIfExists('request_order_to_service_providers');
    }
};
