<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        Blade::component('components.main-user', 'mainUser');
        Blade::component('components.main-admin', 'mainAdmin');
        Blade::component('components.navbar-user', 'navbarUser');
        Blade::component('components.navbar-user', 'navbarAdmin');
    }
}
