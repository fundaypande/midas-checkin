<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert first admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);

        // insert first admin
        DB::table('users')->insert([
            'name' => 'User A',
            'email' => 'usera@user.com',
            'password' => Hash::make('123456'),
            'role_id' => 3
        ]);

        DB::table('users')->insert([
            'name' => 'User B',
            'email' => 'userb@user.com',
            'password' => Hash::make('123456'),
            'role_id' => 3
        ]);

        // insert role admin
        DB::table('roles')->insert([
            'id' => 1,
            'role_name' => 'Super Admin',
            'role_sub_title' => 'Can access all features',
        ]);

        // insert role admin
        DB::table('roles')->insert([
            'id' => 2,
            'role_name' => 'Admin',
            'role_sub_title' => 'Can access all features',
        ]);

        // insert role admin
        DB::table('roles')->insert([
            'id' => 3,
            'role_name' => 'User',
            'role_sub_title' => 'User Page',
        ]);

        // DB::table('roles')->insert([
        //     'id' => 4,
        //     'role_name' => 'Pengunjung',
        //     'role_sub_title' => 'Pengunjung',
        // ]);
    }
}
