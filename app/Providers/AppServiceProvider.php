<?php

namespace App\Providers;

use view;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
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

       view()->composer('layouts/frontend_master',function($data){

        $categories = Category::with('subcategories')->get();

$data->with('categories',$categories );

       });


    }
}
