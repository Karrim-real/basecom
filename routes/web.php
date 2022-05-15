<?php

use App\Http\Controllers\Auth\AdministraviceController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(FrontendController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/products', 'show')->name('products');
    Route::get('/product/{product}/{title}', 'singleProd')->name('single.prod');
    Route::post('/add-to-cart/{product}', 'addToCart')->name('add-to-cart');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact-us');
    Route::post('/contact', 'contactstore')->name('contact-send');
    Route::get('/privacy', 'privacy')->name('privacy-policy');
    Route::get('/error', 'myerror')->name('error-page');
    Route::get('/faq', 'faq')->name('faq-page');
    Route::get('/tracking', 'tracking')->name('tracking-page');
    Route::post('/tracking', 'trackingCreate')->name('tracking-create');

});

Route::controller(UserAuthController::class)->group(function(){

    Route::get('/register',  'index')->name('register');
    Route::post('/register',  'store')->name('register-form');
    Route::get('/login',  'show')->name('login');
    Route::post('/login',  'create')->name('login-post');
    Route::get('/logout',  'destroySession')->name('logout');
    Route::get('/forget-password',  'forgetPass')->name('forget-password');
    Route::post('/forget-password',  'forgetPassCreate')->name('forgetPost');

});


Route::controller(CheckoutController::class)->group(function(){
    Route::get('/checkout',  'index')->name('checkout')->middleware('auth');
    Route::post('/checkout', 'show')->name('checkout-post')->middleware('auth');
});

Route::controller(CartController::class)->group(function(){
    Route::get('/cart', 'index')->name('cart-page')->middleware('auth');
});


Route::group(['prefix' => 'admin'], function(){
    Route::controller(AdministraviceController::class)->group(function(){
        Route::get('/login', 'index')->name('admin.login');
        Route::post('/login',  'show')->name('admin.loginpost');
        Route::get('/logout',  'destroySession')->name('admin.logout');
        Route::get('/forgetpassword',  'forgetPass')->name('admin.forget');
        Route::post('/forgetpassword',  'forgetPassPost')->name('admin.forgetpost');
    });


    Route::controller(ProductController::class)->group(function(){
        Route::get('/dashboard',  'index')->name('admin.dashboard')->middleware('auth');
        Route::get('/add-product',  'create')->name('admin.addproduct')->middleware('auth');
        Route::post('/add-product',  'store')->name('admin.addproduct')->middleware('auth');
        Route::get('/edit-product/{product}',  'show')->name('admin.editproduct')->middleware('auth');
        Route::put('/edit-product/{product}',  'update')->name('admin.updateproduct')->middleware('auth');
        Route::get('/deleteproduct/{product}',  'destroy')->name('admin.producdelete')->middleware('auth');
    });

    Route::controller(CategoryController::class)->group(function(){

        Route::get('/categorys',  'index')->name('admin.categorys')->middleware('auth');
        Route::get('/add-category',  'create')->name('admin.addcategory')->middleware('auth');
        Route::post('/add-category',  'store')->name('admin.addcategory')->middleware('auth');
        Route::get('/edit-category/{category}',  'show')->name('admin.editcategory')->middleware('auth');
        Route::put('/edit-category/{category}',  'update')->name('admin.updatecategory')->middleware('auth');
        Route::get('/delete-category/{category}',  'destroy')->name('admin.deletecategory')->middleware('auth');
    });

});

Route::any('*', function(){
    return view('frontend.404');
});





