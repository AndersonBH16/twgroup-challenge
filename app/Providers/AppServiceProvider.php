<?php

namespace App\Providers;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        Route::aliasMiddleware('role', RoleMiddleware::class);

        Gate::define('isAdminView', function($user) {
            return $user->role == 'admin';
        });
    }
}
