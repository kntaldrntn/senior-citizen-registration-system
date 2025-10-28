<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SeniorCitizen;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeniorCitizen>
 */
class SeniorCitizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'contact_number' => '09' . fake()->numerify('#########'), // PH format: 09XXXXXXXXX
            'address' => fake()->address(),
            'email' => fake()->unique()->safeEmail(),
            'birth_date' => fake()->date(),
            // 'photo_image' => fake()->imageUrl(),
        ];
    }
}
