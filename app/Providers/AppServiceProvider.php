<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Navbar;

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
    public function boot(): void
    {
        $boxSize = 0; //счетчик товаров
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();


        View::composer('layouts.sidebar.categories', function (\Illuminate\View\View $view) {
            return $view->with('categories', Category::all());

        });
        View::composer('layouts.header', function (\Illuminate\View\View $view) {
            $navbars = Navbar::orderBy('ordering')->get();
            return $view->with('navbars', $navbars);
        });

        View::composer('*', function (\Illuminate\View\View $view) use ($boxSize) {
            $id = Auth::id();

            if ($id) {
                $currentOrder = Order::getCurrentOrder($id);
                if ($currentOrder) {
                    $boxSize = sizeof($currentOrder->goods);
                }
            }
            return $view
                ->with('boxSize', $boxSize);
        });
    }

}
