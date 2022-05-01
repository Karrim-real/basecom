<?php

namespace App\Providers;

use App\Services\AuthService\AuthService;
use AuthRepository;
use Illuminate\Support\ServiceProvider;

class UserAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthRepository::class, AuthService::class);
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
