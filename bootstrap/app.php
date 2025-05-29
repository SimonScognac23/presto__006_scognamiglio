<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsRevisor; 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    
    ->withMiddleware(function (Middleware $middleware) {
    
        //   Perché il middleware funzioni, però, dobbiamo registrarlo in bootstrap/app.php in questa maniera
        
        $middleware->alias([
            'isRevisor' => IsRevisor::class
        ]);
        
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
