<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SubCategory;
use App\Models\Package;

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
        
        View::composer('front.*', function ($view) {
            $subCategories = SubCategory::with(['services' => fn ($q) => $q->orderBy('sort_order') ])->orderBy('sort_order')->get();
            $packages = Package::with(['services' => fn ($q) => $q->orderBy('sort_order') ])->orderBy('sort_order')->get();
            $view->with([
                'subCategories' => $subCategories,
                'packages' => $packages,
            ]);
        });
    }
}
