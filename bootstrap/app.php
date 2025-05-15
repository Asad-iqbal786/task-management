<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php', // ✅ Make sure this is set
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Aliases for route middleware
        $middleware->alias([
            'checkRole' => \App\Http\Middleware\AdminMiddleware::class,
            'userRole' => \App\Http\Middleware\UserMiddleware::class,
            // Instead of your custom version:
            // 'auth' => \App\Http\Middleware\Authenticate::class,
            'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
            'auth:sanctum' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Optional for SPA
    
        ]);

        // Custom route groups
        $middleware->group('adminGroup', ['auth', 'checkRole']);
        $middleware->group('userGroup', ['auth', 'userRole']);

        // API middleware group for Sanctum
        $middleware->group('api', [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


