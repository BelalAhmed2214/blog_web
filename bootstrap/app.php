<?php

use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\RoleOrPermissionMiddleware;
use Illuminate\Pipeline\Pipeline;

// Create The Application
$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// Bind Important Interfaces
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

// // Add Middleware Aliases
// $app->withMiddleware(function (Pipeline $middleware) {
//     $middleware->alias([
//         'role' => RoleMiddleware::class,
//         'permission' => PermissionMiddleware::class,
//         'role_or_permission' => RoleOrPermissionMiddleware::class,
//     ]);
// });

// Return The Application
return $app;
