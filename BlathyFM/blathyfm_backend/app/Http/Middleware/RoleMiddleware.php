<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Ellenőrizzük, hogy a bejelentkezett felhasználó szerepköre benne van-e az engedélyezettekben
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            return response()->json(['message' => 'Hozzáférés megtagadva!'], 403);
        }

        return $next($request);
    }
}