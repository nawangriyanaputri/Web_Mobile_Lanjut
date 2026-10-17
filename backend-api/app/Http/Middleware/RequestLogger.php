<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; 

class RequestLogger
{
    public function handle(Request $request, Closure $next)
    {
        \Illuminate\Support\Facades\Log::info('Request diterima: ' . $request->method() . ' ' . $request->path());

        return $next($request);
    }
}