<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminAuth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernel;

class Kernel extends HttpKernel
{
    // Other properties and methods...

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Other middleware...
        // 'auth' => \App\Http\Middleware\Authenticate::class,
        'admin.auth' => \App\Http\Middleware\AdminAuth::class,
        // More middleware...
    ];

    // Other properties and methods...
}