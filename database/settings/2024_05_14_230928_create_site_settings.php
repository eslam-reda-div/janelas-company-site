<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.title', 'test');
        $this->migrator->add('site.fave_icon', 'test');
        $this->migrator->add('site.logo', 'test');
    }
};
