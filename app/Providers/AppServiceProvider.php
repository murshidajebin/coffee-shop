<?php

namespace App\Providers;
use App\Models\Order;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    View::composer('admin.*', function ($view) {
        $notifyCount = Order::where('status','pending')->count();
        $view->with('notifyCount', $notifyCount);
    });
}
}
