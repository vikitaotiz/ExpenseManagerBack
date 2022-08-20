<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'name' => 'Store One',
            'company_id' => fake()->numberBetween($min = 1, $max = 3),
            'description' => fake()->sentence(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('stores')->insert([
            'name' => 'Store Two',
            'company_id' => fake()->numberBetween($min = 1, $max = 3),
            'description' => fake()->sentence(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('stores')->insert([
            'name' => 'Store Three',
            'company_id' => fake()->numberBetween($min = 1, $max = 3),
            'description' => fake()->sentence(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
