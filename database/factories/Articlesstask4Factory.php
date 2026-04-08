<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\articlesstask4>
 */
class Articlesstask4Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5),
            'body' => fake()->paragraphs(3, true),
            'views' => fake()->numberBetween(0, 5000),
            'is_published' => fake()->boolean(),
        ];
    }
}
