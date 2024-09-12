<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_designation')->insert([
            ['name' => 'Marketing Manager', 'created_at' => Carbon::now()],
            ['name' => 'Mobile Application Dev', 'created_at' => Carbon::now()],
            ['name' => 'HR Associate', 'created_at' => Carbon::now()]
        ]);
    }
}
