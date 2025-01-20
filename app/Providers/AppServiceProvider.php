<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        
        // Set locale untuk Carbon  
       setlocale(LC_TIME, 'id_ID.UTF-8'); // Mengatur locale ke Bahasa Indonesia  
       Carbon::setLocale('id'); // Mengatur locale Carbon  
    }
}
