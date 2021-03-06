<?php

namespace Database\Seeders;

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
        $this->call(UserTableSeeder::class);
        $this->call(GameTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(PackagesTableSeeder::class);

    }
}
