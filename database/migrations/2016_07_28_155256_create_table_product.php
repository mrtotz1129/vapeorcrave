<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table){

            $table->increments('int_product_id');
            $table->integer('int_category_id_fk')
                ->unsigned();
            $table->integer('int_brand_id_fk')
                ->unsigned();
            $table->integer('int_volume_id_fk')
                ->unsigned();
            $table->integer('int_nicotine_id_fk')
                ->unsigned();
            $table->string('str_product_name')
                ->unique();
            $table->text('str_product_photo_path')
                ->nullable();
            $table->integer('int_inventory_id_fk')
                ->unsigned()
                ->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('int_category_id_fk')
                ->references('int_category_id')
                ->on('categories');

            $table->foreign('int_brand_id_fk')
                ->references('int_brand_id')
                ->on('brands');

            $table->foreign('int_volume_id_fk')
                ->references('int_volume_id')
                ->on('volumes');

            $table->foreign('int_nicotine_id_fk')
                ->references('int_nicotine_id')
                ->on('nicotines');

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
