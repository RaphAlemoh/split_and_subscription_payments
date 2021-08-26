<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        Game::insert([
            [
                'name' => 'Guess number',
                'amount' => 100,
                'type' => 'dual', 'status' => 1, 'created_at' => $now, 'updated_at' => $now
            ],

            [
                'name' => 'Vigilant Force',
                'amount' => 0,
                'type' => 'dual', 'status' => 1, 'created_at' => $now, 'updated_at' => $now
            ],

            [
                'name' => 'Zombie',
                'amount' => 100,
                'type' => 'dual', 'status' => 1, 'created_at' => $now, 'updated_at' => $now
            ],

            [
                'name' => 'Car Race',
                'amount' => 0,
                'type' => 'dual', 'status' => 1, 'created_at' => $now, 'updated_at' => $now
            ],
        ]);
    }
}
