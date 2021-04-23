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

        $this->call(MPointSeeder::class);
        $this->call(MQuestionSeeder::class);
        $this->call(MTestQuestionSeeder::class);
        $this->call(MTestSeeder::class);
        $this->call(MUserResultSeeder::class);
        $this->call(MDiscussionSeeder::class);

    }
}
