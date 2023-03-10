<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
        $this->app->register(DuskServiceProvider::class);
    }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // view()->share([
        //     'appName'=>'Admin Panel',
        //     'locale'=>app()->getLocale(),
        //     'charset'=>config('app.charset'),
        //     'timezone'=>config('app.timezone'),
        //     'favicon'=>asset('assets/images/favicon.ico'),
        //     'logo'=>asset('assets/images/logo.png'),
        //     'logoDark'=>asset('assets/images/logo-dark.png'),
        // ]);

        Schema::defaultStringLength(191);
    }
}