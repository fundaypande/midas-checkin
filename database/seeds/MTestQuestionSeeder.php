<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MTestQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_test_questions')->insert([
            'id' => 1,
            'test_id' => 1,
            'question_id' => 1,
        ]);

        DB::table('m_test_questions')->insert([
            'id' => 2,
            'test_id' => 1,
            'question_id' => 2,
        ]);

        for ($i=1; $i <= 100; $i++) {
            DB::table('m_test_questions')->insert([
                'test_id' => 2,
                'question_id' => $i,
            ]);
        }
    }
}
