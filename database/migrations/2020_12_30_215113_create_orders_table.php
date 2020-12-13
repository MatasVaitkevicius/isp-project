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
            $table->id();
            $table->date('purchase_date')->nullable();
            $table->double('items_price')->nullable();
            $table->double('delivery_price')->nullable();
            $table->date('earliest_expected_delivery')->nullable();
            $table->date('latest_expected_delivery')->nullable();
            $table->date('delivered_on')->nullable();
            $table->integer('order_status')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('products');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
