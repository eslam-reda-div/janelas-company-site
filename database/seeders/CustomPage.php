<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomPage extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CustomPage::factory(4)->create();
    }
}
