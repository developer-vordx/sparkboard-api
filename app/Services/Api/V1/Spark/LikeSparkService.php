<?php

namespace App\Services\Api\V1\Spark;

use App\Models\SparkLike;
use App\Utils\BaseService;
use App\Contracts\Api\V1\Spark\LikeSparkInterface;

class LikeSparkService extends  BaseService  implements LikeSparkInterface
{

    public function handle($request)
    {
        try {

            $like = SparkLike::firstOrNew([
                'spark_id' => $request['id'],
                'user_id'  => $request['user_id'],
            ]);

            $isNewLike = !$like->exists;

            $isNewLike ? $like->save() : $like->delete();

            return success(
                $isNewLike ? 'Spark liked successfully.' : 'Spark unliked successfully.',
                [
                    'spark_id' => $request['id'],
                    'liked'    => $isNewLike
                ]
            );

        } catch (\Exception $exception) {

            $this->logException($exception);
            return errors(
                'Failed to fetch Sparks. Please try again later.',
                $exception->getMessage(),
                500);
        }
    }
}
