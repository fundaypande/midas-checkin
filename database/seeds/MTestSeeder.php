<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_tests')->insert([
            'id' => 1,
            'test_name' => 'Try Out',
            'test_time' => '60',
            'test_date' =>  '2020-09-01',
            'test_description' =>  'Tata tertib test',
            'total' => 2,
            'free' => 1
        ]);

        DB::table('m_tests')->insert([
            'id' => 2,
            'test_name' => 'Try In',
            'test_time' => '60',
            'test_date' =>  '2020-09-01',
            'test_description' =>  'Tata tertib test',
            'total' => 100
        ]);
    }
}
