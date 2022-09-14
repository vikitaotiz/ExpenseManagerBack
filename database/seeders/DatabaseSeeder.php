<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CompanySeeder::class);
        // $this->call(StoreSeeder::class);

        $this->call(PaymentModeSeeder::class);
        $this->call(MaterialCategorySeeder::class);
        
        // $this->call(RoleSeeder::class);
        // $this->call(PartSeeder::class);

        // // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(13)->create();
        
        // $this->call(UserSeeder::class);
        
        // $this->call(UnitSeeder::class);

        // \App\Models\Product::factory(50)->create();
    }
}
