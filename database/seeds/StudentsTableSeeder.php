<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student')->insert(
            [
                ['name' => 'Nam 1','date_of_birth'=>'2018-04-10','address'=>'SG','class_id'=>2],
                ['name' => 'Nam 2','date_of_birth'=>'2018-04-10','address'=>'DN','class_id'=>1],
                ['name' => 'Nam 3','date_of_birth'=>'2018-04-10','address'=>'QN','class_id'=>1],
                ['name' => 'Nam 4','date_of_birth'=>'2018-04-10','address'=>'HN','class_id'=>1],
                ['name' => 'Nam 5','date_of_birth'=>'2018-04-10','address'=>'PY','class_id'=>2],
                
            ]
        );
    }
}
