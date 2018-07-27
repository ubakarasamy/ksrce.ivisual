<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
        'name' => "teststudent2",
        'email' => "teststudent2@app.com",
        'register_no' => 22345678,
        'batch' => "2014 to 2018",
        'department' => "CSE",
        'phone' => 1234567890,
        'address' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit.",
        'gurdian_name' => 'testgurdian2',
        'year' => 3,
        'section' => "a",
        'semester' => 5
        ]);
    }
}
