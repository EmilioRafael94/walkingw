<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // Fix for older MySQL versions that require a default string length
        // Only applies to relational databases, not MongoDB.
        Schema::defaultStringLength(191);

        // For MongoDB-specific setup, if necessary:
        if (config('database.default') === 'mongodb') {
            // Add any MongoDB-specific initialization code here.
        }
    }
}
