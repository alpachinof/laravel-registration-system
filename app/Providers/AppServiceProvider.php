<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Blade;

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
        // if($this->app->environment('production')) {
        //     \URL::forceScheme('https');
        // }

        Blade::if('admin', function () {
            return auth()->user()->role  == 1;
        });
    }
}
