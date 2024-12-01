<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'picture' => "https://fakeimg.pl/1920x1080/?text=person%20image",
            'date_of_birth' => fake()->date(),
            'date_of_death' => fake()->date(),
            'biography' => fake()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
