<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
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
        }else{
            \URL::forceScheme('https');
        }

        $categorys = Category::latest()->take(3)->get();
        view()->share('categorys', $categorys);

        // $products = Cart::all();
        // // dd(Auth::user());
        // view()->share('products', $products);

    }
}
