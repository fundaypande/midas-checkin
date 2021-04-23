<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feature_masters')->insert([
            'id' => 3,
            'feature_master_name' => 'Histories',
            'feature_master_description' => 'View, add, update, remove group users',
            'feature_category_id' => 5,
            'slug' => '/admin/history'
        ]);

        DB::table('features')->insert([
            'id' => 9,
            'feature_name' => 'Histories',
            'description' => 'Show History Management',
            'feature_master_id' =>  3,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 1,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 10,
            'feature_name' => 'Restore Data',
            'description' => 'Restore Data Management',
            'feature_master_id' =>  3,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);
    }
}
