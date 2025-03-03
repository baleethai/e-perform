<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $site_logo;
    public string $site_description;
    public string $email;
    public string $phone;
    public string $address;
    public string $facebook;
    public string $twitter;
    public string $instagram;
    public string $google_map;
    public string $opening_hours;

    public static function group(): string
    {
        return 'general';
    }
}
