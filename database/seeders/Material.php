<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Material extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Material::factory(20)->create();
    }
}
