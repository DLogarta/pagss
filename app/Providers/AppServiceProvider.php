<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::if('canAccess', function ($page){
            $user = session('user');
            $cleanedPages = str_replace(['[', ']', '"'], '', $user->pages);
            $pages = explode(',', $cleanedPages);
            return in_array($page, $pages);
        });
    }
}
