<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        for($i = 0 ; $i<50;$i++){
            DB::table('users')->insert([
                [
                    'name' => 'user' . $i,
                    'email' => 'user'.$i.'@example.com',
                    'password' => Hash::make('123456789'),
                    'start_date' => Carbon::now(),
                    'num_of_months' => 6,
                    'end_date' => Carbon::now()->addMonths(6),
                    'status' => 'active',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]);
        };
    }
}
