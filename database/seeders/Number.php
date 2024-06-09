<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Number extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Number::factory(4)->create();
    }
}
