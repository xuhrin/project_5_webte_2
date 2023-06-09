<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('layouts.app', function ($view) {
            $view->with('locale', App::getLocale());
            $view->with('locales', ['en', 'sk']);
        });

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        $url = app('request')->root();
        $url = str_replace(['http://', 'https://'], '', $url);
        config(['app.url' => 'https://' . $url]);
    }
}
