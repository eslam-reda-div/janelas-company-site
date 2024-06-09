<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSetting extends Settings
{
    public string $title;

    public string $fave_icon;

    public string $logo;

    public string $color;

    public string $secondary_color;

    public array $email;

    public array $location;

    public array $phone;

    public array $map;

    public array $social;

    public string $services_paragraph_en;

    public string $services_paragraph_ar;

    public string $pages_header_image;

    public string $catalog_image;

    public string $catalog_paragraph_en;

    public string $catalog_paragraph_ar;

    public string $catalog_pdf;

    public string $footer_image;

    public string $footer_text_en;

    public string $footer_text_ar;

    public string $about_image;

    public string $about_title_en;

    public string $about_title_ar;

    public string $about_text_en;

    public string $about_text_ar;

    public string $whats_app_number;

    public string $home_contact_form_image;

    public string $contact_form_text_ar;

    public string $contact_form_text_en;

    public string $material_page_text_ar;

    public string $material_page_text_en;

    public string $footer_logo;

    public static function group(): string
    {
        return 'site';
    }
}
