<?php

namespace ManhLe\CartPackage\Providers;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'routes/web.php');
        $this->loadViewsFrom(__DIR__.'views/fronts/cart/cartproduct.blade.php', 'cartproduct');
        $this->loadViewsFrom(__DIR__.'views/fronts/cart/listcart.blade.php', 'listcart');
        $this->loadMigrationsFrom(__DIR__.'database/migrations');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
