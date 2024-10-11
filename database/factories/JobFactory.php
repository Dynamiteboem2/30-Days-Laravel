<?php

namespace Database\Factories;

use App\Models\Employer; // Voeg deze regel toe
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'employer_id' => Employer::factory(),  // Zorgt ervoor dat bij elke Job een Employer wordt gemaakt
            'salary' => '$50,000 USD'
        ];
    }
}
