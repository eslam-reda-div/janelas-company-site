<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('header.header_text', [
            [
                'title_en' => 'Welcome to our Gallery',
                'title_ar' => 'مرحبا بكم في معرضنا',
                'description_en' => 'We are happy to have you here',
                'description_ar' => 'نحن سعداء بوجودكم هنا',
                'sub_title_en' => 'We have the best collection of images',
                'sub_title_ar' => 'لدينا أفضل مجموعة من الصور',
            ],
            [
                'title_en' => 'Welcome to our Gallery 1',
                'title_ar' => 'مرحبا بكم في معرضنا 1',
                'description_en' => 'We are happy to have you here 1',
                'description_ar' => 'نحن سعداء بوجودكم هنا 1',
                'sub_title_en' => 'We have the best collection of images 1',
                'sub_title_ar' => 'لدينا أفضل مجموعة من الصور 1',
            ],
        ]);
        $this->migrator->add('header.image', 'test');
    }
};
