<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HeaderSetting extends Settings
{
    public array $header_text;

    public string $image;

    public static function group(): string
    {
        return 'header';
    }
}
