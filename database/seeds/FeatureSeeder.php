<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feature_categories')->insert([
            'id' => 1,
            'feature_category_name' => 'General',
            'feature_category_description' => 'Bisa digunakan semua user',
            'icon' => 'fa-book'
        ]);

        DB::table('feature_categories')->insert([
            'id' => 2,
            'feature_category_name' => 'Features',
            'feature_category_description' => 'All Features In Appication',
            'icon' => 'fa-th-large'
        ]);

        DB::table('feature_categories')->insert([
            'id' => 3,
            'feature_category_name' => 'Reports',
            'feature_category_description' => 'All Reports In Appication',
            'icon' => 'fa-chart-bar'
        ]);

        DB::table('feature_categories')->insert([
            'id' => 4,
            'feature_category_name' => 'Users',
            'feature_category_description' => 'Users Management System',
            'icon' => 'fa-users'
        ]);

        DB::table('feature_categories')->insert([
            'id' => 5,
            'feature_category_name' => 'Settings',
            'feature_category_description' => 'System Settings',
            'icon' => 'fa-tools'
        ]);

        DB::table('feature_categories')->insert([
            'id' => 6,
            'feature_category_name' => 'Master Data',
            'feature_category_description' => 'All data in system',
            'icon' => 'fa-book-open'
        ]);

        // ************************
        // FEATURE MASTER
        // ************************

        DB::table('feature_masters')->insert([
            'id' => 1,
            'feature_master_name' => 'Users',
            'feature_master_description' => 'View, add, update, remove users that can access the system',
            'feature_category_id' => 4,
            'slug' => '/admin/users'
        ]);

        DB::table('feature_masters')->insert([
            'id' => 2,
            'feature_master_name' => 'User Groups',
            'feature_master_description' => 'View, add, update, remove group users',
            'feature_category_id' => 4,
            'slug' => '/admin/groups'
        ]);


        // feature master dengan id=3 sudah didefinisikan di HistorySeeder.php
        DB::table('feature_masters')->insert([
            'id' => 4,
            'feature_master_name' => 'Feature Categories',
            'feature_master_description' => 'View, add, update, remove feature category (master menu)',
            'feature_category_id' => 5,
            'slug' => '/admin/feature-cat'
        ]);

        DB::table('feature_masters')->insert([
            'id' => 5,
            'feature_master_name' => 'Feature Masters',
            'feature_master_description' => 'View, add, update, remove feature management (register new feature)',
            'feature_category_id' => 5,
            'slug' => '/admin/feature'
        ]);

        // ************************
        // MIDEAS CHECKIN
        // ************************

        DB::table('feature_masters')->insert([
            'id' => 6,
            'feature_master_name' => 'Room Type',
            'feature_master_description' => 'Kelola Room Type',
            'feature_category_id' => 6,
            'slug' => '/admin/room-type'
        ]);

        DB::table('feature_masters')->insert([
            'id' => 7,
            'feature_master_name' => 'Property Setting',
            'feature_master_description' => 'Property Setting',
            'feature_category_id' => 5,
            'slug' => '/admin/property-setting'
        ]);

        DB::table('feature_masters')->insert([
            'id' => 8,
            'feature_master_name' => 'Checkin Report',
            'feature_master_description' => 'Checkin Report',
            'feature_category_id' => 3,
            'slug' => '/admin/checkin-repport'
        ]);

        // DB::table('feature_masters')->insert([
        //     'id' => 9,
        //     'feature_master_name' => 'User Result',
        //     'feature_master_description' => 'User Result',
        //     'feature_category_id' => 2,
        //     'slug' => '/admin/result'
        // ]);

        // DB::table('feature_masters')->insert([
        //     'id' => 10,
        //     'feature_master_name' => 'User Test',
        //     'feature_master_description' => 'User Test',
        //     'feature_category_id' => 2,
        //     'slug' => '/admin/result'
        // ]);


        // hilangkan 'feature_category_id' karena sudah didefinisikan di table 'feature_masters'

        DB::table('features')->insert([
            'id' => 1,
            'feature_name' => 'Users',
            'description' => 'Users Management',
            'feature_master_id' =>  1,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 1,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 2,
            'feature_name' => 'Update Users',
            'description' => 'Update Users Management',
            'feature_master_id' =>  1,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 3,
            'feature_name' => 'Create Users',
            'description' => 'Create Users Management',
            'feature_master_id' =>  1,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 4,
            'feature_name' => 'Remove Users',
            'description' => 'Remove Users Management',
            'feature_master_id' =>  1,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 5,
            'feature_name' => 'User Groups',
            'description' => 'User Groups Management',
            'feature_master_id' =>  2,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 1,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 6,
            'feature_name' => 'Create User Groups',
            'description' => 'Create User Groups Management',
            'feature_master_id' =>  2,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 7,
            'feature_name' => 'Update User Groups',
            'description' => 'Update User Groups Management',
            'feature_master_id' =>  2,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 8,
            'feature_name' => 'Remove User Groups',
            'description' => 'Remove User Groups Management',
            'feature_master_id' =>  2,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        // make feature to access feature_categories table
        // dimulai dari id=11 karena id 9 10 sudah didefiniskan di
        // HistorySeeder.php

        DB::table('features')->insert([
            'id' => 11,
            'feature_name' => 'Feature Categories',
            'description' => 'Show Feature Category Management',
            'feature_master_id' =>  4,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 1,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 12,
            'feature_name' => 'Store Feature Category',
            'description' => 'Store Feature Category Management',
            'feature_master_id' =>  4,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 13,
            'feature_name' => 'Update Feature Category',
            'description' => 'Update Feature Category Management',
            'feature_master_id' =>  4,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 14,
            'feature_name' => 'Delete Feature Category',
            'description' => 'Delete Feature Category Management',
            'feature_master_id' =>  4,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        // untuk fitur membuat master fitur dan fitur
        DB::table('features')->insert([
            'id' => 15,
            'feature_name' => 'Feature Masters',
            'description' => 'Show Feature and Feature Master Management',
            'feature_master_id' =>  5,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 1,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 16,
            'feature_name' => 'Update Feature Masters',
            'description' => 'Update Feature and Feature Master Management',
            'feature_master_id' =>  5,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 17,
            'feature_name' => 'Store Feature Masters',
            'description' => 'Store Feature and Feature Master Management',
            'feature_master_id' =>  5,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 18,
            'feature_name' => 'Delete Feature Masters',
            'description' => 'Delete Feature and Feature Master Management',
            'feature_master_id' =>  5,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        // Ketinggal 1 feature untuk update role pengguna
        DB::table('features')->insert([
            'id' => 19,
            'feature_name' => 'Update User Groups Access',
            'description' => 'Update User Groups Access Management',
            'feature_master_id' =>  2,
            // 'feature_category_id' => 4,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        // ************************
        // MIDAS ECHECKIN
        // ************************

        // Room Type
        DB::table('features')->insert([
            'id' => 20,
            'feature_name' => 'Room Type',
            'description' => 'Show Room Type',
            'feature_master_id' =>  6,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 1,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 21,
            'feature_name' => 'Update Room Type',
            'description' => 'Update Room Type',
            'feature_master_id' =>  6,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 22,
            'feature_name' => 'Store Room Type',
            'description' => 'Store Room Type',
            'feature_master_id' =>  6,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 23,
            'feature_name' => 'Delete Room Type',
            'description' => 'Delete Room Type',
            'feature_master_id' =>  6,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        // Property Setting
        DB::table('features')->insert([
            'id' => 24,
            'feature_name' => 'Property Setting',
            'description' => 'Show Property Setting',
            'feature_master_id' =>  7,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 1,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 25,
            'feature_name' => 'Update Property Setting',
            'description' => 'Update Property Setting',
            'feature_master_id' =>  7,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 26,
            'feature_name' => 'Store Property Setting',
            'description' => 'Store Property Setting',
            'feature_master_id' =>  7,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 27,
            'feature_name' => 'Delete Property Setting',
            'description' => 'Delete Property Setting',
            'feature_master_id' =>  7,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);


        // Checkin Report
        DB::table('features')->insert([
            'id' => 28,
            'feature_name' => 'Checkin Report',
            'description' => 'Show Checkin Report',
            'feature_master_id' =>  8,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 1,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 29,
            'feature_name' => 'Store Checkin Report',
            'description' => 'Store Checkin Report',
            'feature_master_id' =>  8,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);


        DB::table('features')->insert([
            'id' => 30,
            'feature_name' => 'Update Property Setting',
            'description' => 'Update Property Setting',
            'feature_master_id' =>  8,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);

        DB::table('features')->insert([
            'id' => 31,
            'feature_name' => 'Delete Property Setting',
            'description' => 'Delete Property Setting',
            'feature_master_id' =>  8,
            // 'feature_category_id' => 5,
            'general' => 0,
            'in_menu' => 0,
            'aktive' => 1,
        ]);





        // Group test
        // DB::table('features')->insert([
        //     'id' => 32,
        //     'feature_name' => 'Doing Test',
        //     'description' => 'Doing Test',
        //     'feature_master_id' =>  10,
        //     // 'feature_category_id' => 5,
        //     'general' => 0,
        //     'in_menu' => 0,
        //     'aktive' => 1,
        // ]);

        // DB::table('features')->insert([
        //     'id' => 33,
        //     'feature_name' => 'Store Test Result',
        //     'description' => 'Store Test Result',
        //     'feature_master_id' =>  10,
        //     // 'feature_category_id' => 5,
        //     'general' => 0,
        //     'in_menu' => 0,
        //     'aktive' => 1,
        // ]);




    }
}
