<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'middle_name' => fake()->name,
            'last_name' => fake()->lastName,
            'company_name' => fake()->company,
            'phone' => fake()->phoneNumber,
            'country' => fake()->country,
            'location' => fake()->streetName,
            'company_email' => fake()->companyEmail,
            'user_id' => User::factory(),
        ];
    }
}
