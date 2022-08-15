<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'phone' => '+254714581597',
            'email' => 'admin@email.com',
            'country' => 'Kenya',
            'role_id' => 1,
            'company_id' => 1,
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Vikita',
            'phone' => '+254724581596',
            'email' => 'vikita@email.com',
            'country' => 'Uganda',
            'role_id' => 2,
            'company_id' => 2,
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Otiz',
            'phone' => '+254724581586',
            'email' => 'otiz@email.com',
            'country' => 'Tanzania',
            'role_id' => 2,
            'company_id' => 3,
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
