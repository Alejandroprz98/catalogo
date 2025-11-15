<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\HandleCors as Middleware;

class HandleCors extends Middleware
{
    protected $allowedOrigins = ['http://localhost:4200'];
    protected $allowedMethods = ['*'];
    protected $allowedHeaders = ['*'];
}
