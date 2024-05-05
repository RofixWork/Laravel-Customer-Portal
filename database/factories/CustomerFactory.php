<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    private array $cities = ['casablanca', 'agadir', 'tanger', 'fes', 'taroudant'];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'age' => fake()->numberBetween(20, 60),
            'city' => $this->cities[array_rand($this->cities)],
            'job' => fake()->jobTitle(),
        ];
    }
}
