<?php

namespace App\Filters\Api\V1\Spark;

use Closure;

class Status
{
    public function handle($request, Closure $next)
    {
        if (request()->has('status')) {
            $request = $request->where('visibility', request('status'));
        }
        return $next($request);
    }
}
