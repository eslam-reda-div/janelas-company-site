<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.contact_form_text_en', 'test');
        $this->migrator->add('site.contact_form_text_ar', 'test');
    }
};
