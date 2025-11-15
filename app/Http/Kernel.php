<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Middleware global (se ejecuta en todas las peticiones)
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\HandleCors::class, // Habilita CORS globalmente
    ];

    /**
     * Grupos de middleware
     */
    protected $middlewareGroups = [
        'web' => [
            // Si no usas sesiones o cookies, puede quedar vacío
        ],

        'api' => [
            \App\Http\Middleware\HandleCors::class, // <--- AGREGA ESTA LÍNEA AQUÍ
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Middleware individuales
     */
    protected $routeMiddleware = [
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
