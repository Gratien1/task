<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...
    protected $routeMiddleware = [
        // ...existing middlewares...
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
    ];
}
