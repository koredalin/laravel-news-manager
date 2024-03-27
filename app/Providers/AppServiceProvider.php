<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\NewsLoaderService;
use App\Services\NewsApiOrgService;
use App\Services\NewsDataIoService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NewsLoaderService::class, function ($app) {
            return new NewsLoaderService(
                new NewsApiOrgService(),
                new NewsDataIoService()
            );
        });

        $this->app->bind(NewsApiOrgService::class, function ($app) {
            return new NewsApiOrgService();
        });

        $this->app->bind(NewsDataIoService::class, function ($app) {
            return new NewsDataIoService();
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
