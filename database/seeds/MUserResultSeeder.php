<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MUserResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 3; $i++) {
            DB::table('m_user_results')->insert([
                'test_id' => 1,
                'user_id' => 2,
                'result' => 80,
                'result_description' => 'Tingkatkan lagi',
            ]);
        }
    }
}
