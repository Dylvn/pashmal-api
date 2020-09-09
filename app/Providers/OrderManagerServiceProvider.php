<?php

namespace App\Providers;

use App\Services\OrderManager;
use Illuminate\Support\ServiceProvider;

class OrderManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            OrderManager::class
        );
    }
}
