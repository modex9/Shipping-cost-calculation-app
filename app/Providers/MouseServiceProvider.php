<?php

namespace App\Providers;

use App\Contracts\MouseHouse;
use App\Services\NormalHouseService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use App\Services\SidlauskaiHomeService;

class MouseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MouseHouse::class, function (Application $app) {
            return new NormalHouseService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
