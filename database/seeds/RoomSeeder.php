<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_room_types')->insert([
            'user_id' => 1,
            'room_type' => 'Free Data',
            'room_desc' => 'One Bed Room',
            'room_note' => 'Free Kulkas',
            'room_rate' => 45000
        ]);
    }
}
