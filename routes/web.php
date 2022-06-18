<?php

use App\Http\Controllers\Auth\AdministraviceController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\FrontendController;
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
    Route::post('/add-to-cart', 'addToCartAjax')->name('add-to-cartajax');
    Route::get('/about', 'about')->name('about');
    Route::get('/delivery', 'deliverys')->name('deliverys');

    Route::get('/privacy', 'privacy')->name('privacy-policy');
    Route::get('/error', 'myerror')->name('error-page');
    Route::get('/faq', 'faq')->name('faq-page');
    Route::get('/terms', 'terms')->name('terms');

    Route::get('/tracking', 'tracking')->name('tracking-page');
    Route::post('/tracking', 'trackingCreate')->name('tracking-create');
    Route::get('/categorys', 'allCates')->name('categorys');
    Route::get('/category/{category}', 'cateProds')->name('category.id');
    Route::get('/discord', 'discordCates')->name('discord-server');
    Route::get('/freelance', 'freelaneCates')->name('freelance-service');
});

Route::controller(ContactController::class)->group(function(){
    Route::get('contact', 'index')->name('contact-us');
    Route::post('contact', 'store')->name('contact-send');
});

Route::controller(UserAuthController::class)->group(function(){

    Route::get('/register',  'index')->name('register');
    Route::post('/register',  'store')->name('register-form');
    Route::get('/verifyaccount/{verifytoken}',  'verify')->name('verifyaccount');
    Route::get('/login',  'show')->name('login');
    Route::post('/login',  'create')->name('login-post');
    Route::get('/logout',  'destroySession')->name('logout');
    Route::get('/forget-password',  'forgetPass')->name('forget-password');
    Route::post('/forget-password',  'forgetPassCreate')->name('forgetPost');
    Route::get('/changepassword/{verifytoken}',  'changePass')->name('chaangepassword');
    Route::post('/changepassword/{verifytoken}',  'changepassPost')->name('changepasspost');

});

Route::controller(OrderController::class)->group(function(){

    Route::get('/my-account/{user}/{name}',  'index')->name('myaccount')->middleware('auth');

});


Route::controller(CartController::class)->group(function(){
    Route::get('/load-count', 'countCart')->name('count.cart')->middleware('auth');
    Route::get('/load-nav-prods', 'AjaxNavProd')->name('ajaxnav')->middleware('auth');

    Route::get('/cart', 'index')->name('cart-page')->middleware('auth');
    Route::get('/removecart/{product}', 'delete')->name('removeproduct')->middleware('auth');
});


Route::controller(CheckoutController::class)->group(function(){
    Route::get('/checkout',  'index')->name('checkout')->middleware('auth');
    Route::post('/checkout', 'show')->name('checkout-post')->middleware('auth');
    Route::post('/place-order', 'create')->name('place-order')->middleware('auth');
    Route::get('/preview-order', 'previews')->name('preview-order')->middleware('auth');
    Route::get('/thanks-you/{reference}', 'thanks')->name('thanks-you/')->middleware('auth');
});

Route::webhooks('charge/webhookhandler');

Route::controller(PaymentController::class)->group(function(){
    Route::get('/mypayment', 'index');
    Route::post('/payment',  'payment');
    Route::get('/order-payment/{paymentref}', 'orderPayment')->name('order-payment')->middleware('auth');
    Route::get('/thank-btc', 'thankbtc')->name('thanks-btc')->middleware('auth');
});



Route::group(['prefix' => 'admin'], function(){
    Route::controller(AdministraviceController::class)->group(function(){
        Route::get('/users', 'index')->name('users');
        Route::get('/users/create', 'create')->name('users.createuser');
        Route::post('/user',  'store')->name('admin.storeuser');
        Route::get('/useredit/{user}',  'edit')->name('admin.edituser');
        Route::put('/userupdate/{user}',  'update')->name('admin.updateuser');
        Route::get('/deleteuser/{user}',  'destroy')->name('admin.destroyuser');
        Route::get('/searchuser',  'searchuser')->name('admin.search.user');

    });


    Route::controller(ProductController::class)->group(function(){
        Route::get('/dashboard',  'index')->name('admin.dashboard')->middleware('auth');
        Route::get('/add-product',  'create')->name('admin.addproduct')->middleware('auth');
        Route::post('/add-product',  'store')->name('admin.addproduct')->middleware('auth');
        Route::get('/edit-product/{product}',  'show')->name('admin.editproduct')->middleware('auth');
        Route::put('/edit-product/{product}',  'update')->name('admin.updateproduct')->middleware('auth');
        Route::get('/deleteproduct/{product}',  'destroy')->name('admin.producdelete')->middleware('auth');
        Route::get('/searchproduct',  'search')->name('admin.search.product');
    });

    Route::controller(CategoryController::class)->group(function(){

        Route::get('/categorys',  'index')->name('admin.categorys')->middleware('auth');
        Route::get('/add-category',  'create')->name('admin.addcategory')->middleware('auth');
        Route::post('/add-category',  'store')->name('admin.addcategory')->middleware('auth');
        Route::get('/edit-category/{category}',  'show')->name('admin.editcategory')->middleware('auth');
        Route::put('/edit-category/{category}',  'update')->name('admin.updatecategory')->middleware('auth');
        Route::get('/delete-category/{category}',  'destroy')->name('admin.deletecategory')->middleware('auth');
        Route::get('/searchcategory',  'search')->name('admin.search.category');
    });

    Route::controller(BackendOrderController::class)->group(function(){

        Route::get('/orders',  'index')->name('orders')->middleware('auth');
        Route::get('/edit-order/{order}',  'edit')->name('admin.showorder')->middleware('auth');
        Route::put('/edit-order/{order}',  'update')->name('admin.updateorder')->middleware('auth');
        Route::get('/delete-order/{order}',  'destroy')->name('admin.deleteorder')->middleware('auth');
        Route::get('/searchorders',  'search')->name('admin.search.order');


    });


});

Route::any('*', function(){
    return view('frontend.404');
});





