<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view) {
            $getTheme = Cache::remember('settings', now()->addHours(24), function () {
                return \App\Models\Setting::all()->pluck('value', 'key')->toArray();
            });

            $view->with('getTheme', $getTheme);
        });
    }
}