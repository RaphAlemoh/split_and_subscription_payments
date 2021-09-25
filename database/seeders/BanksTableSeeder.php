<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Bank;
use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $banks =  [
            ['name' =>  'Access Bank' ,'code' => '044', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Citibank', 'code' => '023', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Diamond Bank', 'code' => '063', 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Ecobank Nigeria', 'code' => '050', 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Fidelity Bank Nigeria', 'code' => '070', 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'First Bank of Nigeria', 'code' => '011', 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'First City Monument Bank', 'code' => '214', 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Guaranty Trust Bank', 'code' => '058', 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Heritage Bank Plc', 'code' => '030' , 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Jaiz Bank', 'code' => '301' , 'created_at' => $now, 'updated_at' => $now],
            [  'name' => 'Keystone Bank Limited', 'code' => '082' , 'created_at' => $now, 'updated_at' => $now],
            [  'name' => 'Providus Bank Plc', 'code' => '101' , 'created_at' => $now, 'updated_at' => $now],
            [  'name' => 'Polaris Bank', 'code' => '076' , 'created_at' => $now, 'updated_at' => $now],
            [  'name' => 'Stanbic IBTC Bank Nigeria Limited', 'code' => 221 , 'created_at' => $now, 'updated_at' => $now],
            [  'name' => 'Standard Chartered Bank', 'code' => '068' , 'created_at' => $now, 'updated_at' => $now],
            [  'name' => 'Sterling Bank', 'code' => '232' , 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Suntrust Bank Nigeria Limited', 'code' => '100' , 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Union Bank of Nigeria', 'code' => '032' , 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'United Bank for Africa', 'code' => '033' , 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Unity Bank Plc', 'code' => '215' , 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Wema Bank', 'code' => '035' , 'created_at' => $now, 'updated_at' => $now],
            [ 'name' => 'Zenith Bank', 'code' => '057' , 'created_at' => $now, 'updated_at' => $now]
        ];

        Bank::insert($banks);
    }
}
