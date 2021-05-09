<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->string('address');
            $table->string('status')->default('pending')->comment('processing','pending','completed');
            $table->float('grant_total');
            $table->integer('item_count');
            $table->string('payment_method')->default('cash_on_delivery')->comment('cash_on_delivery','bkash','rocket','nogod');
            $table->string('city');
            $table->string('country');
            $table->string('post_code');
            $table->string('phone_number');
            $table->text('notes');
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
        Schema::dropIfExists('orders');
    }
}
