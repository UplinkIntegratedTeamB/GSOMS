<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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

        Blade::if('admin', function() {
            return auth()->user()->isAdmin();
        });

        Blade::if('headstaff', function() {
            return auth()->user()->isHeadStaff();
        });

        Blade::if('staff', function() {
            return auth()->user()->isStaff();
        });

        Blade::if('user', function() {
            return auth()->user()->isUser();
        });

        Blade::if('bmo', function() {
            return auth()->user()->isBmo();
        });
    }
}
