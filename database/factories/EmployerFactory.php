<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $model = \App\Models\Employer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
        ];
    }
}
