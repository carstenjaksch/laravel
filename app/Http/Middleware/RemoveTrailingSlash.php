<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class RemoveTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Str::endsWith($request->getPathInfo(), '/')) {
            return redirect(
                Str::replaceLast('/', '', $request->getRequestUri())
            );
        }

        return $next($request);
    }
}
