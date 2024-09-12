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
        DB::table('employee_users')->insert([
            ['name' => 'John Doe', 'phone_number' => '8877665544', 'fk_department' => 1, 'fk_designation' => 1, 'created_at' => Carbon::now()],
            ['name' => 'Tommy Mark', 'phone_number' => '9876543210', 'fk_department' => 2, 'fk_designation' => 2, 'created_at' => Carbon::now()],
            ['name' => 'Alexandra', 'phone_number' => '8787879696', 'fk_department' => 3, 'fk_designation' => 3, 'created_at' => Carbon::now()],
        ]);
    }
}
