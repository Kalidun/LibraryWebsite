<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'author' => $this->faker->name,
            'category_id' => $this->faker->numberBetween(1, 3),
            // 'description' => collect($this->faker->paragraphs(mt_rand(1, 2))) -> map(fn($paragraph) => "<p>$paragraph</p>") -> join(''),
            'description' => $this->faker->text(50),
        ];
    }
}
