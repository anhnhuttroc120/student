<?php

use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 	DB::table('school')->insert(
            [
                ['name' => 'PhanChauTrinh'],
                ['name' => 'NguHanhSon'],
            
            ]
        );
    }
}
