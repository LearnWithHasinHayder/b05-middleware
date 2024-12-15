<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SimpleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //deny
        // return response()->json([
        //     'message' => 'Access Denied'
        // ], 403);

        if(!auth()->check()){
            return response()->json([
                'message' => 'Access Denied'
            ], 403);
        }

        return $next($request);
    }
}
