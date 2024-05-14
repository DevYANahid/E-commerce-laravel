<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedProductsTable extends Migration
{
    /**
     * Run the migrations.
     * 'customers_order_id', 'name', 'qty', 'image', 'price'
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->id();
            $table->integer('customers_orders_id');
            $table->string('name');
            $table->integer('qty');
            $table->string('image');
            $table->float('price');
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
        Schema::dropIfExists('ordered_products');
    }
}
