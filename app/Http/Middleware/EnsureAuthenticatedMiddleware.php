<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAuthenticatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken() ?? $request->cookie('auth_token');
        \Log::info('Request URL:', [$request->fullUrl()]);
        \Log::info('Authorization header:', [$request->header('Authorization')]);
        \Log::info('Token from header or cookie:', [$token]);
        \Log::info('Cookies:', [$request->cookies->all()]); // Log all cookies for debugging

        if (!$token) {
            \Log::error('No token found, redirecting to login');
            return redirect('/login');
        }

        // Validate token (assuming Laravel Sanctum)
        try {
            $accessToken = \Laravel\Sanctum\PersonalAccessToken::findToken($token);
            if (!$accessToken || !$accessToken->tokenable) {
                \Log::error('Invalid token, redirecting to login');
                return redirect('/login');
            }
            \Auth::setUser($accessToken->tokenable);
        } catch (\Exception $e) {
            \Log::error('Token error: ' . $e->getMessage());
            return redirect('/login');
        }

        return $next($request);
    }
}
