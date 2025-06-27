<?php

namespace App\Services\Api\V1\Spark;

use App\Models\Comment;
use App\Utils\BaseService;
use App\Contracts\Api\V1\Spark\CommentSparkInterface;

class CommentSparkService extends  BaseService  implements CommentSparkInterface
{
    public function handle($request)
    {
        try {

            $comment = Comment::create([
                'body' => $request->comment,
                'user_id' => $request->user_id,
                'spark_id' => $request->id,
            ]);

            return success('your comment added ',$comment);
        } catch (\Exception $exception) {

            $this->logException($exception);
            return errors(
                'Failed to fetch Sparks. Please try again later.',
                $exception->getMessage(),
                500);
        }
    }
}
