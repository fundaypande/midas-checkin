<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        $faker = Faker::create('id_ID');


        DB::table('m_questions')->insert([
            'id' => 1,
            'question' => 'Seorang perempuan usia 30 tahun datang ke BPM dengan keluhan terlambat haidselama 3 minggu, saat ini merasa mual muntah dipagi hari. Hasil pemeriksaan pemeriksaan KU ibu baik TD 110/70 mmHg, N 84 x/menit, R 24 x/menit, S 360C.Apakah pemeriksaan penunjang yang dilakukan untuk menegakkan diagnosa ?',
            'correct_answare' => 'A',
            'completion' =>  'Pembahasannya adalah karena A benar',
        ]);

        DB::table('m_questions')->insert([
            'id' => 2,
            'question' => '2.	Seorang perempuan berusia 27 tahun G1P0A0 usia kehamilan 10 minggu datang ke BPM mengeluh mual muntah setiap makan, hasil pemeriksaan KU ibu baik TD 110/80mmHg, N 88 x/menit, R 20x/menit, S 36,5oC.Bagaimanakah cara mengatasi keluhan pada kasus di atas?',
            'correct_answare' => 'B',
            'completion' =>  'Pembahasannya adalah karena B benar',
        ]);

        for ($i=0; $i < 180; $i++) {
            DB::table('m_questions')->insert([
                'question' => 'Soal: ' . $faker->realText($maxNbChars = 200, $indexSize = 2),
                'correct_answare' => 'B',
                'completion' =>  'Pembahasan: ' . $faker->realText($maxNbChars = 200, $indexSize = 2),
            ]);
        }
    }
}
