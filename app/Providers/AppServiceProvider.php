<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
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
        // here add routes file
        
        Route::middleware('web','user.auth')->prefix('admin')->name('admin.')->group(
            base_path('routes/admin.php')
            );

            Route::middleware('web')
            ->group(base_path('routes/user.php'));

            Route::middleware('web')->prefix('api')
            ->group(base_path('routes/api.php'));

    }
}
