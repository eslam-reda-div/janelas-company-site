<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.footer_image', 'test ar');
        $this->migrator->add('site.footer_text_en', 'test ar');
        $this->migrator->add('site.footer_text_ar', 'test ar');
    }
};
