<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        Plan::insert([

            ['plan_name' => 'Free',
            'plan_amount' => 0,
            'plan_code' => '893yef76e', 'plan_interval' => 1, 'created_at' => $now, 'updated_at' => $now],


            ['plan_name' => 'Shuzia Basic',
            'plan_amount' => 1000,
            'plan_code' => 'PLN_yb2v2hntua7vbm0', 'plan_interval' => 6, 'created_at' => $now, 'updated_at' => $now],

            ['plan_name' => 'Shuzia Premium Plan',
            'plan_amount' => 10000,
            'plan_code' => 'PLN_xj62pb1a2lo23k3', 'plan_interval' => 12, 'created_at' => $now, 'updated_at' => $now],

      ]);
    }
}
