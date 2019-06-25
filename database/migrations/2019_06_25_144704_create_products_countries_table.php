<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('product_id')
            ->references('id')
            ->on('products')->onDelete( 'cascade' )
			      ->onUpdate( 'cascade' );
            $table->foreign('country_id')
            ->references('id')
            ->on('countries')->onDelete( 'cascade' )
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
        Schema::dropIfExists('products_countries');
    }
}
