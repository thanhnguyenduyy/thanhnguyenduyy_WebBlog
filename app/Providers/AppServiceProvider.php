<?php

namespace App\Providers;

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
        try {
            if (\Schema::hasTable('site_settings')) {
                $settings = \App\Models\SiteSetting::all()->pluck('value', 'key');
                view()->share('settings', $settings);
            }
        } catch (\Exception $e) {
            // Silence error if table doesn't exist yet
        }
    }
}
