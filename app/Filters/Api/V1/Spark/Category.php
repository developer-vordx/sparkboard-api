<?php

namespace App\Filters\Api\V1\Spark;

use Closure;

class Category
{
    public function handle($request, Closure $next)
    {
        if (request()->has('category_id')) {
            $request = $request->where('category_id', request('category_id'));
        }
        return $next($request);
    }
}
