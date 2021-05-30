<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 31; $i++) {
            DB::table('role_accesses')->insert([
                'role_id' => 1,
                'feature_id' => $i,
            ]);
        }

        for ($i=20; $i <= 31; $i++) {
            DB::table('role_accesses')->insert([
                'role_id' => 3,
                'feature_id' => $i,
            ]);
        }

        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 28,
        // ]);

        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 29,
        // ]);

        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 30,
        // ]);

        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 31,
        // ]);

        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 32,
        // ]);

        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 33,
        // ]);

        // // property setting
        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 24,
        // ]);

        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 25,
        // ]);

        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 26,
        // ]);

        // DB::table('role_accesses')->insert([
        //     'role_id' => 3,
        //     'feature_id' => 27,
        // ]);

    }
}
