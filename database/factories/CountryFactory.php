<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Code' => strtoupper($this->faker->unique()->lexify('???')),
            'Name' => $this->faker->country,
            'Continent' => $this->faker->randomElement(['Asia','Europe','North America','Africa','Oceania','Antarctica','South America']),
            'Region' => $this->faker->word,
            'Population' => $this->faker->numberBetween(100000, 150000000),
            'LifeExpectancy' => $this->faker->randomFloat(1, 45, 85),
            'GovernmentForm' => $this->faker->randomElement(['Republic', 'Constitutional Monarchy', 'Monarchy']),
            'HeadOfState' => $this->faker->name,
            'IndepYear' => $this->faker->optional()->year,
        ];
    }
}
