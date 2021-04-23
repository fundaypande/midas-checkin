<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MDiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_discussions')->insert([
            'profile_id' => 2,
            'user_id' => 2,
            'chat' => 'Halo perkenalkan nama saya Pande',
            'is_user' => 2,
        ]);

        DB::table('m_discussions')->insert([
            'profile_id' => 2,
            'user_id' => 1,
            'chat' => 'Baik pande salam kenal',
            'is_admin' => 1
        ]);

        DB::table('m_discussions')->insert([
            'profile_id' => 2,
            'user_id' => 2,
            'chat' => 'Buk saya ada masalah saat jawab soal',
            'is_user' => 2,
        ]);

        DB::table('m_discussions')->insert([
            'profile_id' => 2,
            'user_id' => 2,
            'chat' => 'Materinya gak muncul dia buk',
            'is_user' => 2,
        ]);

        DB::table('m_discussions')->insert([
            'profile_id' => 2,
            'user_id' => 1,
            'chat' => 'Coba kirimkan jadwalnya',
            'is_admin' => 1,
        ]);

        DB::table('m_discussions')->insert([
            'profile_id' => 3,
            'user_id' => 3,
            'chat' => 'Halo mis mohon balas',
            'is_user' => 3,
            'readed' => 0
        ]);
    }
}
