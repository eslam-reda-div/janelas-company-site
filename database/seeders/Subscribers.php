<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Subscribers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Subscribers::factory(20)->create();
    }
}
