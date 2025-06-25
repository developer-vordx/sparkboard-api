<?php

namespace App\Http\Controllers\Api\V1\Spark;

use App\Contracts\Api\V1\Spark\IgniteInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Spark\IgniteRequest;
use App\Models\Spark;
use Illuminate\Http\Request;

class SparkController extends Controller
{
    protected IgniteInterface $ignite;

    public function __construct(IgniteInterface $ignite)
    {
        $this->ignite = $ignite;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function igniteSpark(IgniteRequest $request)
    {
        return $this->ignite->handle($request);
    }

}
