<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Visitors extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Visitors::factory(100)->create();
    }
}
