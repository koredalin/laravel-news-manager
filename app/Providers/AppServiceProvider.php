<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\NewsLoaderService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NewsLoaderService::class, function ($app) {
            return new NewsLoaderService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
