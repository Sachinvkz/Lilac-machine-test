<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_department')->insert([
            ['name' => 'Sales and marketing', 'created_at' => Carbon::now()],
            ['name' => 'Application development', 'created_at' => Carbon::now()],
            ['name' => 'Human resources', 'created_at' => Carbon::now()]
        ]);
    }
}
