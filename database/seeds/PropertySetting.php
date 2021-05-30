<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_property_settings')->insert([
            'user_id' => 1,
            'owner_name' => 'Edy Sujana',
            'property_name' => 'The Kayuputih Villa & SPA',
            'property_adress' => 'Jl. Damai No.100x, Kayu Putih, Kec. Sukasada, Kabupaten Buleleng, Bali 81152',

            'billing_info' => 'BCA 476576***',
        ]);

        DB::table('m_property_settings')->insert([
            'user_id' => 2,
            'owner_name' => 'Sudana yasa',
            'property_name' => 'Reservation',
            'property_adress' => 'pande',

            'billing_info' => 'BCA 476576',
        ]);

        DB::table('m_property_settings')->insert([
            'user_id' => 3,
            'owner_name' => 'Sudana yasa',
            'property_name' => 'Reservation',
            'property_adress' => 'pande',

            'billing_info' => 'BCA 476576',
        ]);
    }
}
