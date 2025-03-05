<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
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
            'employer_id' => Employer::factory(),
            'description' => fake()->paragraph(),
            'salary' => '$' . number_format(fake()->numberBetween(100000, 900000), 0, '.', ','),
            'locations' => json_encode(fake()->randomElements([fake()->city(), fake()->city(), 'Remote'], fake()->numberBetween(1, 3), false)),
            'type' => fake()->randomElement(['Full-time', 'Part-time']),
            'status' => 'active',
        ];
    }

    /**
     * Indicate that the job listing is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }
}
