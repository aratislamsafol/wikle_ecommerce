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
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('review_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('product_slug');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('product_information');
            $table->integer('product_quantity');
            $table->integer('price');
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three');
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
        Schema::dropIfExists('products');
    }
}
