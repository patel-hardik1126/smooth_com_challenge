<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('product_id')
            ->references('id')
            ->on('products')->onDelete( 'cascade' )
			      ->onUpdate( 'cascade' );
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')->onDelete( 'cascade' )
			      ->onUpdate( 'cascade' );

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_categories');
    }
}
