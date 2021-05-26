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
            'room_type' => 'One Bed Room',
            'room_desc' => 'One Bed Room',
            'room_note' => 'Free Kulkas',
            'room_rate' => 45000
        ]);

        DB::table('m_room_types')->insert([
            'user_id' => 1,
            'room_type' => 'Two Bed Room',
            'room_desc' => 'One Bed Room',
            'room_note' => 'Free Kulkas',
            'room_rate' => 85000
        ]);

        DB::table('m_room_types')->insert([
            'user_id' => 2,
            'room_type' => 'Two Bed Room',
            'room_desc' => 'One Bed Room',
            'room_note' => 'Free Kulkas',
            'room_rate' => 85000
        ]);

        DB::table('m_room_types')->insert([
            'user_id' => 3,
            'room_type' => 'Two Bed Room',
            'room_desc' => 'One Bed Room',
            'room_note' => 'Free Kulkas',
            'room_rate' => 85000
        ]);

        DB::table('m_room_types')->insert([
            'user_id' => 3,
            'room_type' => 'Two Bed Room',
            'room_desc' => 'One Bed Room',
            'room_note' => 'Free Kulkas',
            'room_rate' => 85000
        ]);
    }
}
