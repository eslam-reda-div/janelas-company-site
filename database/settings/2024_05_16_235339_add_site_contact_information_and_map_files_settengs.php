<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.social', [
            ['icon' => 'fa fa-', 'link' => 'http://text.com'],
            ['icon' => 'fa fa-', 'link' => 'http://text.com'],
            ['icon' => 'fa fa-', 'link' => 'http://text.com'],
        ]);
        $this->migrator->add('site.email', [
            ['email' => 'test@example.com', 'label' => 'test'],
        ]);
        $this->migrator->add('site.location', [
            ['address' => 'test address', 'label' => 'test'],
        ]);
        $this->migrator->add('site.phone', [
            ['phone' => '1234567890', 'label' => '1234567890'],
        ]);
        $this->migrator->add('site.map', [
            ['lat' => '0.0', 'lng' => '0.0'],
        ]);
    }
};
