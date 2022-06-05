<?php

namespace App\Providers;

use App\interfaces\ContactInterface;
use App\Services\ContactService;
use Illuminate\Support\ServiceProvider;

class ContactUsServiceProvider extends ServiceProvider
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
