<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(),
            'icon' => $this->faker->imageUrl(),
            'title_en' => $this->faker->sentence,
            'title_ar' => $this->faker->sentence,
            'small_description_en' => $this->faker->sentence,
            'small_description_ar' => $this->faker->sentence,
            'description_en' => $this->faker->paragraph,
            'description_ar' => $this->faker->paragraph,
            'unit_price' => $this->faker->randomFloat(2, 1, 100),
            'is_published' => $this->faker->boolean,
        ];
    }
}
