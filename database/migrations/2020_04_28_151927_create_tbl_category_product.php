<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('category_id');
            $table->string('product_name');
            //$table->string('product_category');
            $table->decimal('product_price');
            $table->decimal('product_amount');
            $table->string('product_source');
            $table->string('product_image_link');
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
        Schema::dropIfExists('tbl_category_product');
    }
}
