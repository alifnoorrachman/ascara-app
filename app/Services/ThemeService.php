<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class ThemeService
{
    public function getCurrentTheme()
    {
        return Session::get('current_theme', 'ascara');
    }

    public function setTheme($theme)
    {
        if (array_key_exists($theme, Config::get('themes.themes'))) {
            Session::put('current_theme', $theme);
            return true;
        }
        return false;
    }

    public function getThemeConfig()
    {
        $currentTheme = $this->getCurrentTheme();
        return Config::get("themes.themes.{$currentTheme}");
    }
}
