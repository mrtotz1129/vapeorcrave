<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function(Blueprint $table){

            $table->increments('int_inventory_id');
            $table->integer('int_branch_id_fk')
                ->unsigned();
            $table->integer('int_product_id_fk')
                ->unsigned();
            $table->integer('int_prev_value');
            $table->integer('int_current_value');
            $table->boolean('bool_is_consigned');
            $table->integer('int_user_id_fk')
                ->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('int_branch_id_fk')
                ->references('int_branch_id')
                ->on('branches');

            $table->foreign('int_product_id_fk')
                ->references('int_product_id')
                ->on('products');

            $table->foreign('int_user_id_fk')
                ->references('id')
                ->on('users');

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
