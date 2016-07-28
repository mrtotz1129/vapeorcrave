<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function(Blueprint $table){

            $table->increments('int_brand_id');
            $table->string('str_brand_name');
            $table->text('str_brand_photo_path')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique('str_brand_name');

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
