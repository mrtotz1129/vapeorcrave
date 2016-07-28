<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->integer('int_position_id_fk')
                ->unsigned();
            $table->integer('int_branch_id_fk')
                ->unsigned();

            $table->foreign('int_position_id_fk')
                ->references('int_position_id')
                ->on('positions');

            $table->foreign('int_branch_id_fk')
                ->references('int_branch_id')
                ->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
