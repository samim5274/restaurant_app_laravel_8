<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;  
use App\Models\Order;
use App\Models\Cart;
use Auth;
use Illuminate\Support\Carbon;


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
        Paginator::useBootstrap();
        View::composer('dashboard.layouts.*', function ($view) {
            $order = Order::count() + 1;
            $kitchen = Order::where('kitchen','!=', 4)->count();
            $invoice = Carbon::now()->format('Ymd').Auth::guard('admin')->id().$order;
            $orderList = Order::where('status', 1)->count();
            $due = Order::where('status', 3)->count();

            $view->with([
                'due' => $due,
                'order' => $orderList,
                'kitchen' => $kitchen,
                'count' => Cart::where('reg', $invoice)->count()
            ]);
        });
    }
}
