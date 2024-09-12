<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\topic>
 */
class topicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'image' => basename(fake()->image(public_path('adminassets/images/topics'))),
            'category_id' => fake()->numberBetween(1, 10),
            'content' => fake()->sentence(),
            'no_of_views' => fake()->numberBetween(0, 1000),
            'published' => fake()->numberBetween(0, 1),
            'trending' => fake()->numberBetween(0, 1),

        ];
    }
}
