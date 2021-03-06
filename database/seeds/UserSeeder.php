<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'int_position_id_fk'        =>  1,
            'int_branch_id_fk'          =>  1,
            'created_at'                =>  Carbon::now(),
            'updated_at'                =>  Carbon::now()
        ]);
    }
}
