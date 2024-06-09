<?php

namespace Database\Factories;

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
        return [
            'title_en' => $this->faker->sentence,
            'title_ar' => $this->faker->sentence,
            'content_en' => $this->faker->paragraph,
            'content_ar' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'is_published' => $this->faker->boolean,
        ];
    }
}
