<?php

// app/Providers/AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Registering role middleware if it isn't registered elsewhere
        Route::aliasMiddleware('role', RoleMiddleware::class);
    }

    public function register()
    {
        // Other registration logic here
    }
}
