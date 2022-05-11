<?php

namespace App\Providers;

use App\Interfaces\AdminAuthInterface;
use App\Services\AdminAuthService;
use Illuminate\Support\ServiceProvider;

class AdminAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminAuthInterface::class, AdminAuthService::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
