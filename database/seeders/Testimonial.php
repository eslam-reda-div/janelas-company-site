<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Testimonial extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Testimonial::factory(10)->create();
    }
}
