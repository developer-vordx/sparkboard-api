<?php

namespace App\Filters\Api\V1\Spark;

use Closure;

class Search
{
    public function handle($request, Closure $next)
    {
        if ($search = request('search')) {
            $request = $request->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }
        return $next($request);
    }
}
