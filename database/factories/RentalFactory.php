<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => DB::raw('(SELECT id FROM books ORDER BY RAND() LIMIT 1)'),
            'member_id' => DB::raw('(SELECT id FROM members ORDER BY RAND() LIMIT 1)'),
            'rented_at' => $this->faker->date(),
            'duration_of_rent' => $this->faker->numberBetween(1, 30),
            'returned_at' => $this->faker->date(),
            'operator_id' => DB::raw('(SELECT id FROM users ORDER BY RAND() LIMIT 1)'),
        ];
    }
}
