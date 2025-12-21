<?php

namespace App\Providers;

use App\Models\Treatment;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            // Only load published treatments for booking dropdown
            $therapies = Treatment::query()
                ->where('status', 'published')
                ->orderBy('title', 'asc')
                ->get(['id', 'title', 'slug']);

            $view->with('therapies', $therapies);
        });
    }
}
