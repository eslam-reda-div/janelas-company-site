<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.services_paragraph_en', 'test en');
        $this->migrator->add('site.services_paragraph_ar', 'test ar');
    }
};
