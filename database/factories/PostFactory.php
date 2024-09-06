<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->realText(40);

        return [
            'user_id' => User::first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => str($title)->slug(),
            'content' => fake()->realText(1500),
            'views' => fake()->numberBetween(100, 1000),
        ];
    }
}
