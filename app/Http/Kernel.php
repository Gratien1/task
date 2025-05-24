<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...
    protected $routeMiddleware = [
        // autres middlewares...
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class, // Middleware Spatie pour la gestion des rôles
    ];
}
