<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'str_position_name'     =>  'Super Admin',
            'int_user_access'       =>  1,
            'created_at'            =>  Carbon::now(),
            'updated_at'            =>  Carbon::now()
        ]);
    }
}
