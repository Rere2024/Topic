<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\message>
 */
class messageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_name'=> fake()->randomElement(['Rehab', 'Mohammed','Adam', 'Farida','Nora','Noha']),
            'email' => fake()->unique()->safeEmail(),
            'message'=>fake()->sentence(),
        ];
    }
}
