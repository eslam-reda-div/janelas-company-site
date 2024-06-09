<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CaseStudy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CaseStudy::factory(20)->create();
    }
}
