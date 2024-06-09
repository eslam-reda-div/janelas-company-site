<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaseStudy>
 */
class CaseStudyFactory extends Factory
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
            'title_en' => $this->faker->sentence,
            'title_ar' => $this->faker->sentence,
            'date' => $this->faker->date(),
            'description_en' => $this->faker->paragraph,
            'description_ar' => $this->faker->paragraph,
            'small_description_en' => $this->faker->sentence,
            'small_description_ar' => $this->faker->sentence,
            'is_published' => $this->faker->boolean,
        ];
    }
}
