<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;
use App\Http\Controllers\Customer\CustomerOrderController;

use App\Http\Controllers\Auth\CoffeeLoginController;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Customer\ReviewController;


/* ================== AUTH ================== */

// Route::get('/', function () {
//     return redirect()->route('login');
// });

// Route::get('/login', [CoffeeLoginController::class,'showLogin'])
//     ->name('login');

// Route::post('/coffee-login',
//     [CoffeeLoginController::class,'login']
// )->name('coffee.login');

Route::get('/login', [CoffeeLoginController::class,'showLogin'])->name('login');
Route::post('/coffee-login',[CoffeeLoginController::class,'login'])->name('coffee.login');

Route::post('/logout', function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


/* ================== REGISTER ================== */

Route::get('/register', [CustomerRegisterController::class,'showForm'])
    ->name('register');

Route::post('/register', [CustomerRegisterController::class,'store'])
    ->name('register.store');


/* ================== CUSTOMER ================== */

Route::middleware(['auth','role:customer'])->group(function(){

    Route::get('/shop', [ShopController::class,'home'])
        ->name('shop.home');

    Route::get('/customer/dashboard',[CustomerDashboard::class,'index'])
        ->name('customer.dashboard');

    Route::get('/product/{id}', [ShopController::class,'show'])
        ->name('product.view');

    Route::post('/cart/add/{id}', [CartController::class,'add'])
        ->name('cart.add');

    Route::get('/cart', [CartController::class,'view'])
        ->name('cart.view');

    Route::post('/checkout', [PaymentController::class,'checkout'])
        ->name('checkout');

    Route::get('/order-confirm/{order}',
        [PaymentController::class,'orderConfirm']
    )->name('order.confirm');

    Route::get('/invoice/{order}',
        [PaymentController::class,'invoice']
    )->name('invoice');

    Route::get('/my-orders',[CustomerOrderController::class,'index'])
        ->name('customer.orders');

    Route::get('/my-orders/{id}',
        [CustomerOrderController::class,'show']
    )->name('customer.order.details');

     Route::get('/reviews', [ReviewController::class,'index'])
        ->name('customer.reviews');

    Route::post('/reviews', [ReviewController::class,'store'])
        ->name('customer.reviews.store');

});


/* ================== CART EXTRA ================== */

Route::post('/cart/increase/{id}', [CartController::class,'increase'])
    ->name('cart.increase');

Route::post('/cart/decrease/{id}', [CartController::class,'decrease'])
    ->name('cart.decrease');

Route::post('/cart/remove/{id}', [CartController::class,'remove'])
    ->name('cart.remove');

Route::get('/clear-cart', function () {
    session()->forget('cart');
    return 'Cart cleared';
});


/* ================== ADMIN ================== */

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard',[AdminDashboard::class,'index'])
        ->name('admin.dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    Route::get('/orders', [AdminOrderController::class,'index'])
        ->name('admin.orders');

    Route::get('/orders/{id}', [AdminOrderController::class,'show'])
        ->name('admin.orders.show');

    Route::put('/orders/{id}/status',
        [AdminOrderController::class,'updateStatus']
    )->name('admin.orders.status');

    Route::get('/notifications', function(){
        $orders = \App\Models\Order::where('status','pending')
                    ->latest()->get();
        return view('admin.notifications', compact('orders'));
    })->name('admin.notifications');

});
