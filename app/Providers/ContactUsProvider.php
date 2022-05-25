<?php

namespace App\Providers;

use App\Service\ContactService;
use App\interface\ContactInterface;
use Illuminate\Support\ServiceProvider;

class ContactUsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ContactInterface::class, ContactService::class);

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
