<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CaseCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CaseCategory::factory(4)->create();
    }
}
