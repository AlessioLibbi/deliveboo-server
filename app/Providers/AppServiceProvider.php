<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;
use Illuminate\Pagination\Paginator;

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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'k5xtkyf4dmsg99wy',
                'publicKey' => '9x8spgx497b2n37n',
                'privateKey' => '05bfae42597dddab3bcc97aa5deaa5d1'
            ]);
        });
        Paginator::useBootstrap();
    }
}

