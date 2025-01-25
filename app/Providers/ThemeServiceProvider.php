<?php

namespace App\Providers;

use App\Services\ThemeService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ThemeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ThemeService::class, function ($app) {
            return new ThemeService();
        });
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $themeService = app(ThemeService::class);
            $view->with('theme', $themeService->getThemeConfig());
        });
    }
}