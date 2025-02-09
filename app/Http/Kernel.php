<?php

class Kernel extends \Illuminate\Foundation\Http\Kernel {
    protected $middlewareGroups = [
        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api',
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        ],
    ];
}
?>

