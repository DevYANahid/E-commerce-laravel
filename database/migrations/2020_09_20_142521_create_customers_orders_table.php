<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *'order_no', 'name', 'email', 'phone', 'address_line1', 'address_line2', 'country', 'city', 'zip', 'payment_type', 'payment_phone', 'payment_ref', 'subtotal', 'tax', 'net_price', 'order_time', 'order_date'
     * @return void
     */
    public function up()
    {
        Schema::create('customers_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('zip');
            $table->string('payment_type');
            $table->string('payment_phone')->nullable();
            $table->string('payment_ref')->nullable();
            $table->float('subtotal');
            $table->float('tax');
            $table->float('net_price');
            $table->string('order_time');
            $table->string('order_date');
            $table->string('action_date')->nullable();
            $table->string('delivery_day')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('customers_orders');
    }
}
