<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'name' => 'Title',
            'value' => 'Midas Semilla Kadek',
            'field_type' => 'text',
            'description' => ''
        ]);

        DB::table('settings')->insert([
            'id' => 2,
            'name' => 'Tag Line',
            'value' => 'The seeds of a large system',
            'field_type' => 'text',
            'description' => ''
        ]);

        DB::table('settings')->insert([
            'id' => 3,
            'name' => 'Logo',
            'value' => '/uploads/setting/logo.jpg',
            'field_type' => 'file',
            'description' => "System's logo"
        ]);

        DB::table('settings')->insert([
            'id' => 4,
            'name' => 'Favicon Image',
            'value' => '/uploads/setting/favicon.jpg',
            'field_type' => 'file',
            'description' => ''
        ]);
    }
}
