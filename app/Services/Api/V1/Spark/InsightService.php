<?php

namespace App\Services\Api\V1\Spark;

use App\Models\Spark;
use App\Utils\BaseService;
use App\Contracts\Api\V1\Spark\InsightInterface;

class InsightService extends  BaseService  implements InsightInterface
{
    protected Spark $spark;

    public function __construct(Spark $spark)
    {
        $this->spark = $spark;
    }


    public function handle($request)
    {
        try {
            $spark = $this->spark
                ->with('category:id,name')
                ->withCount(['likes as total_likes'])
                ->withCount(['comments as total_comments'])
                ->find($request->id);


            $comments = $spark->comments()->latest()->paginate(10);

            return success(
                'Spark details fetched successfully.',
                [
                    'spark' => $spark,
                    'comments' => preparePagination($comments),
                ],
                200
            );
        } catch (\Exception $exception) {

            $this->logException($exception);
            return errors($exception->getMessage(), $exception->getCode(),500);
        }
    }
}
