<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\testimonial>
 */
class testimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->randomElement(['Rehab', 'Mohammed','Adam', 'Farida','Nora','Noha']),
            'content'=>fake()->sentence(),
            'published' => fake()->numberBetween(0, 1),
            'image' =>basename(fake()->image(public_path('adminassets/images/testimonials'))),
        ];
    }
}
