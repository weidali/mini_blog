<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Ramsey\Uuid\Guid\Guid;
use Symfony\Component\HttpFoundation\Response;

class SetDeviceIdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasCookie('device_id')) {
            $deviceId = (string) Guid::uuid4();
            $deviceId = hash('sha256', $deviceId);
            Cookie::queue('device_id', $deviceId, 60 * 24 * 365);
        }

        return $next($request);
    }
}
