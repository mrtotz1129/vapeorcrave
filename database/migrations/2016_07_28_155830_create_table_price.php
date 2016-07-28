<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function(Blueprint $table){

            $table->increments('int_price_id');
            $table->integer('int_product_id_fk')
                ->unsigned();
            $table->decimal('deci_price');
            $table->timestamps();

            $table->foreign('int_product_id_fk')
                ->references('int_product_id')
                ->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
