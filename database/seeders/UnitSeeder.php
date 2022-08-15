<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'title' => 'Kilogram',
            'symbol' => 'Kg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('units')->insert([
            'title' => 'Litres',
            'symbol' => 'Lt',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('units')->insert([
            'title' => 'Packets',
            'symbol' => 'Pkts',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
