<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'show'])->name('products');

Route::get('/register', [UserAuthController::class, 'index'])->name('register');
Route::post('/register', [UserAuthController::class, 'store'])->name('register-form');

Route::get('/login', [UserAuthController::class, 'show'])->name('login');
Route::post('/login', [UserAuthController::class, 'create'])->name('login-post');

Route::get('/logout', [UserAuthController::class, 'destroySession'])->name('logout');

Route::get('/forget-password', [UserAuthController::class, 'forgetPass'])->name('forget-password');
Route::post('/forget-password', [UserAuthController::class, 'forgetPassCreate'])->name('forgetPost');

Route::get('/about', [ProductController::class, 'about'])->name('about');
Route::get('/contact', [ProductController::class, 'contact'])->name('contact-us');
Route::get('/privacy', [ProductController::class, 'privacy'])->name('privacy-policy');
Route::get('/404', [ProductController::class, 'error'])->name('error-page');
Route::get('/faq', [ProductController::class, 'faq'])->name('faq-page');

Route::get('/tracking', [ProductController::class, 'tracking'])->name('tracking-page');
Route::post('/tracking', [ProductController::class, 'trackingCreate'])->name('tracking-create');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'show'])->name('checkout-post');

Route::get('/cart', [CartController::class, 'index'])->name('cart-page');





