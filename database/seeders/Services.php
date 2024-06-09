<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Services extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Services::factory(20)->create();
    }
}
