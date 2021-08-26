<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Payment testing';
        $user->email = 'user@payment.com';
        $user->password = bcrypt('user123');
        $user->email_verified_at = NOW();
        $user->save();

    }
}
