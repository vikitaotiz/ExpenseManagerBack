<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Nakumatt',
            'slug' => 'nakumatt-44rrte66346374',
            'phone' => '+254712345671',
            'email' => 'hustlers@email.com',
            'address' => 'CBD',
            'city' => 'Nairobi',
            'country' => 'Kenya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('companies')->insert([
            'name' => 'Uchumi',
            'slug' => 'uchumi-u4tddkvmfkgf',
            'phone' => '+254712345672',
            'email' => 'hustlers@email.com',
            'address' => 'CBD',
            'city' => 'Nairobi',
            'country' => 'Kenya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('companies')->insert([
            'name' => 'Tuskeys',
            'slug' => 'tuskeys-rtwuworgh8574',
            'phone' => '+254712345673',
            'email' => 'hustlers@email.com',
            'address' => 'CBD',
            'city' => 'Nairobi',
            'country' => 'Kenya',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
