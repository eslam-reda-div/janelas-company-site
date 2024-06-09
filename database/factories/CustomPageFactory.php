<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomPage>
 */
class CustomPageFactory extends Factory
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
            'content' => $this->faker->paragraph,
            'is_published' => $this->faker->boolean,
        ];
    }
}
