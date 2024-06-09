<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.about_image', 'test ar');
        $this->migrator->add('site.about_title_en', 'test ar');
        $this->migrator->add('site.about_title_ar', 'test ar');
        $this->migrator->add('site.about_text_en', 'test ar');
        $this->migrator->add('site.about_text_ar', 'test ar');
    }
};
