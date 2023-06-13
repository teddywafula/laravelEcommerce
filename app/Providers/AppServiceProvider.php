<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::bind('App\Contracts\CategoryInterface', 'App\Repository\CategoryRepository');
        App::bind('App\Contracts\VendorInterface', 'App\Repository\VendorRepository');
        App::bind('App\Contracts\ProductInterface', 'App\Repository\ProductRepository');
        App::bind('App\Contracts\CartInterface', 'App\Repository\CartRepository');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
