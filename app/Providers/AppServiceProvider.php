<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        $categorys = Category::all();
        view()->share('categorys', $categorys);
            if(Auth::user()){
                $carts =  Cart::where('user_id', Auth::user()->id);
                // dd($carts);
                view()->share('carts', $carts);
            }



    }
}
