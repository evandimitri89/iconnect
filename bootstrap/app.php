<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\RedirectIfAdmin;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )
  ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
      'role' => RoleMiddleware::class,
      'no-admin' => RedirectIfAdmin::class,
    ]);
  })

  ->withExceptions(function (Exceptions $exceptions): void {
    //
  })->create();
