<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'author_id' => DB::raw('(SELECT id FROM authors ORDER BY RAND() LIMIT 1)'),
            'picture' => "https://fakeimg.pl/1920x1080/?text=person%20image",
            'summary' => $this->faker->paragraph(),
            'page_count' => $this->faker->numberBetween(100, 1000),
            'original_language' => $this->faker->languageCode(),
            'genre_id' => DB::raw('(SELECT id FROM genres ORDER BY RAND() LIMIT 1)'),
            'published_by' => $this->faker->company(),
            'published_at' => $this->faker->date(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
