<?php

namespace App\Http\Controllers\Api\V1\Spark;

use App\Contracts\Api\V1\Spark\ExploreInterface;
use App\Contracts\Api\V1\Spark\IgniteInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Spark\IgniteRequest;
use Illuminate\Http\Request;

class SparkController extends Controller
{
    protected IgniteInterface $ignite;

    protected ExploreInterface $explore;

    public function __construct(IgniteInterface $ignite, ExploreInterface $explore)
    {
        $this->ignite = $ignite;
        $this->explore = $explore;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function igniteSpark(IgniteRequest $request)
    {
        return $this->ignite->handle($request);
    }

    public function exploreSpark(Request $request)
    {
        return $this->explore->handle($request);
    }
}
