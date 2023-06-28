<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'category_id' => Category::factory(),
            'vendor_id' => Vendor::factory(),
            'description' => fake()->text,
            'price' => fake()->randomDigitNotNull,
            'quantity' => fake()->randomDigitNotNull,
            'sku' => fake()->unique(true)->name
        ];
    }
}
