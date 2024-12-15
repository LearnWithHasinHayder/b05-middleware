<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $country = $request->header('cf-ipcountry');
        if($country != 'BD'){
            return response()->json([
                'message' => 'Access denied. This resource is only available in Bangladesh.'
            ], 403);
        }
        
        return $next($request);
    }
}
