<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('gallery.images', [
            [
                'category_en' => 'Category 1',
                'category_ar' => 'الفئة 1',
                'images' => 'images.png',
            ],
        ]);
    }
};
