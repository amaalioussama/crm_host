<?php
namespace App\Http;

use App\Http\Middleware\RoleMiddleware;

class Kernel extends Kernel
{
    protected $routeMiddleware = [
        // Other middleware...
        'role' => RoleMiddleware::class, // Add this line
    ];
}
