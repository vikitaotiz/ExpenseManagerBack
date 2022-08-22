<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->word(),
            'category_id' => fake()->numberBetween($min = 1, $max = 10),
            'unit_id' => fake()->numberBetween($min = 1, $max = 3),
            'store_id' => fake()->numberBetween($min = 1, $max = 3),
            'company_id' => fake()->numberBetween($min = 1, $max = 3),
            'description' => fake()->sentence(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
