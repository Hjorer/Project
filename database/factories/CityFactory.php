<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\city>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => $this->faker->city,
            'CountryCode' => Country::factory(),
            'District' => $this->faker->state,
            'Population' => $this->faker->numberBetween(5000, 10000000),
        ];
    }
}
