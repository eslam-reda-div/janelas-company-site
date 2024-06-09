<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Services>
 */
class ServicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->word,
            'icon' => $this->faker->word,
            'title_en' => $this->faker->word,
            'title_ar' => $this->faker->word,
            'small_description_en' => $this->faker->word,
            'small_description_ar' => $this->faker->word,
            'description_en' => $this->faker->word,
            'description_ar' => $this->faker->word,
            'is_published' => $this->faker->boolean,
        ];
    }
}
