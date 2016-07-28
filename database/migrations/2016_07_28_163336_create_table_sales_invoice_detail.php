<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSalesInvoiceDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoice_details', function(Blueprint $table){

            $table->increments('int_sales_invoice_detail_id');
            $table->integer('int_product_id_fk')
                ->unsigned();
            $table->integer('int_price_id_fk')
                ->unsigned();
            $table->integer('int_quantity');
            $table->timestamps();

            $table->foreign('int_product_id_fk')
                ->references('int_product_id')
                ->on('products');

            $table->foreign('int_price_id_fk')
                ->references('int_price_id')
                ->on('prices');

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
