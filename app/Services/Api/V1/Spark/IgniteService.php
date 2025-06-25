<?php

namespace App\Services\Api\V1\Spark;

use App\Contracts\Api\V1\Spark\IgniteInterface;
use App\Models\Spark;
use App\Utils\BaseService;

class IgniteService extends  BaseService  implements IgniteInterface
{
    protected Spark $spark;

    public function __construct(Spark $spark)
    {
        $this->spark = $spark;
    }


    public function handle($request)
    {
        try {
            $spark = $this->spark->create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ]);
            return success('Your Spark has been successfully ignited and shared with the community!',$spark,201);

        } catch (\Exception $exception) {

            $this->logException($exception);
            return errors($exception->getMessage(), $exception->getCode(),500);
        }
    }
}
