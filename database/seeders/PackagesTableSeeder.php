<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        Package::insert([
            [
                'name' => 'The Red Zone',
                'amount' => 5000,
                'author' => 'Zamier Cahmie',
                'description' => 'one of the best package for developers',
                'type' => 'dual', 'status' => 1, 'created_at' => $now, 'updated_at' => $now
            ],

            [
                'name' => 'The Atomic Systems',
                'amount' => 0,
                'author' => 'Norway Resette',
                'description' => 'CDN package for developers',
                'type' => 'dual', 'status' => 1, 'created_at' => $now, 'updated_at' => $now
            ],

            [
                'name' => 'The Common Arrow',
                'amount' => 1500,
                'author' => 'ZEslint Macro',
                'description' => 'Scurity package for developers',
                'type' => 'dual', 'status' => 1, 'created_at' => $now, 'updated_at' => $now
            ],

            [
                'name' => 'The Turn Over',
                'amount' => 0,
                'author' => 'Nmiesha Zuru',
                'description' => 'Payment package for developers',
                'type' => 'dual', 'status' => 1, 'created_at' => $now, 'updated_at' => $now
            ],
        ]);
    }
}
