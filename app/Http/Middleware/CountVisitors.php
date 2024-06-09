<?php

namespace App\Http\Middleware;

use App\Models\Visitors;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = hash('sha512', $request->ip());
        if (Visitors::where('date', '>', now()->subHour())->where('ip', $ip)->count() < 1) {
            Visitors::create([
                'date' => now(),
                'ip' => $ip,
            ]);
        }

        return $next($request);
    }
}
