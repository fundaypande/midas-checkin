<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $point = ['0', 'A', 'B', 'C', 'D', 'E'];
        // for ($i=1; $i < 6; $i++) {
        //     DB::table('m_points')->insert([
        //         'question_id' => 1,
        //         'point' => $point[$i],
        //         'point_description' => 'Opsi jawaban ke '. $i,
        //     ]);
        // }

        // for ($i=1; $i < 6; $i++) {
        //     DB::table('m_points')->insert([
        //         'question_id' => 2,
        //         'point' => $point[$i],
        //         'point_description' => 'Opsi jawaban ke '. $i,
        //     ]);
        // }

        for ($i=1; $i <= 180; $i++) {
            for ($j=1; $j < 6; $j++) {
                DB::table('m_points')->insert([
                    'question_id' => $i,
                    'point' => $point[$j],
                    'point_description' => $point[$j] . '. ' . $faker->realText($maxNbChars = 50, $indexSize = 2),
                ]);
            }
        }
    }
}
