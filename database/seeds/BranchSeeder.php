<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            'str_branch_location'   =>  'main',
            'created_at'            =>  Carbon::now(),
            'updated_at'            =>  Carbon::now()
        ]);
    }
}
