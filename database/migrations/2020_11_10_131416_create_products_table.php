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
            $table->bigInteger('author_id');
            $table->string('product_name');
            $table->string('description');
            $table->string('price');
            $table->boolean('on_discount')->default(0);
            $table->string('condition');
            $table->boolean('is_service')->default(0);
            $table->boolean('in_stock')->default(0);
            $table->boolean('published')->default(1);
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
