<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSalesInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoices', function(Blueprint $table){

            $table->increments('int_sales_invoice_id');
            $table->decimal('deci_amount_paid');
            $table->integer('int_user_id_fk')
                ->unsigned();
            $table->text('str_remarks')
                ->nullable();
            $table->timestamps();

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
