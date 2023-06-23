<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\Auth\TwoFactorAuthentcationController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CurrencyConverterController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrdersController;
use App\Http\Controllers\Front\PaymentsController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\Front\CategoriesController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StripeWebhooksController;
use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
], function() {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/about', [HomeController::class, 'about'])
    ->name('about');

    Route::get('/contactUs', [HomeController::class, 'contactUs'])
    ->name('contactUs');

    Route::get('/faqs', [HomeController::class, 'faqs'])
    ->name('faqs');

    Route::get('/mailsuccess', [HomeController::class, 'mailsuccess'])
    ->name('mailsuccess');

    Route::get('/notfound', [HomeController::class, 'notfound'])
    ->name('notfound');

    Route::get('/sitemap', [HomeController::class, 'sitemap'])
    ->name('sitemap');

    Route::get('/products', [ProductsController::class, 'index'])
        ->name('products.index');

    Route::get('/products/{product:slug}', [ProductsController::class, 'show'])
        ->name('products.show');

    Route::get('/categories', [CategoriesController::class, 'index'])
        ->name('categories.index');

    Route::get('/categories/{category:slug}', [CategoriesController::class, 'show'])
        ->name('categories.show');

    Route::resource('cart', CartController::class);


    Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout');
    Route::post('checkout', [CheckoutController::class, 'store'])->middleware(['auth:web','verified']);


    Route::get('auth/user/2fa', [TwoFactorAuthentcationController::class, 'index'])
        ->name('front.2fa');

    Route::post('currency', [CurrencyConverterController::class, 'store'])
        ->name('currency.store');

    // Route::post('checkout/create-payment', [PaymentsController::class, 'store'])
    //     ->name('checkout.payment');
});

Route::get('auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])
    ->name('auth.socilaite.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback'])
    ->name('auth.socilaite.callback');

Route::get('auth/{provider}/user', [SocialController::class, 'index']);

// Route::get('orders/{order}/pay', [PaymentsController::class, 'create'])
//     ->name('orders.payments.create');

// Route::post('orders/{order}/stripe/paymeny-intent', [PaymentsController::class, 'createStripePaymentIntent'])
//     ->name('stripe.paymentIntent.create');

// Route::get('orders/{order}/pay/stripe/callback', [PaymentsController::class, 'confirm'])
//     ->name('stripe.return');



//Route::any('stripe/webhook', [StripeWebhooksController::class, 'handle']);

// Route::get('/orders/{order}', [OrdersController::class, 'show'])
//     ->name('orders.show');


// require __DIR__.'/auth.php';

require __DIR__ . '/dashboard.php';
