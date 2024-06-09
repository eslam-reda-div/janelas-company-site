<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GallerySetting extends Settings
{
    public array $images;

    public static function group(): string
    {
        return 'gallery';
    }
}
