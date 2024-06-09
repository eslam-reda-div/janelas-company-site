<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.material_page_text_ar', 'test');
        $this->migrator->add('site.material_page_text_en', 'test');
    }
};
