<?php

namespace App\Providers;


use App\Models\category;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();

        Schema::defaultStringLength(191);


        // view()->composer('layouts.backendLayout', function ($view) {
        //     $view->with('gretting','hello');
        
        // }); // ata app start hower sata sata suru hoba.ar ja fill ar name debo sakanay dorta hoba
        view()->composer('frontend.frontendlayou', function ($view) {
            $view->with('categores',category::with('subcategories')->latest()->get());
        
        });
       
    }

    
    

    
}
