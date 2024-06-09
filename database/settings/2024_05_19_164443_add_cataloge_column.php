<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.catalog_image', 'test ar');
        $this->migrator->add('site.catalog_paragraph_en', 'test ar');
        $this->migrator->add('site.catalog_paragraph_ar', 'test ar');
        $this->migrator->add('site.catalog_pdf', 'test ar');
    }
};
