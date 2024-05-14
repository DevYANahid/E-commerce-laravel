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
            $table->id();
            $table->integer('sub_category_id');
            $table->string('image')->nullable();
            $table->string('name');
            $table->longText('description');
            $table->float('price');
            $table->float('discount')->nullable();
            $table->boolean('status')->default(1);
            $table->string('slag');
            $table->string('sku');
            $table->integer('tag_id')->nullable();
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
        Schema::dropIfExists('category_images');
    }
}
