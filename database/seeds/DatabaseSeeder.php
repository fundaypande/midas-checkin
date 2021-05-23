<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(RoleAccessSeeder::class);
        $this->call(HistorySeeder::class);
        $this->call(SettingSeeder::class);

        $this->call(PropertySetting::class);
        $this->call(ReservationSeeder::class);
        $this->call(RoomSeeder::class);
    }
}
