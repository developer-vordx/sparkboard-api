<?php

namespace App\Services\Api\V1\Spark;

use App\Contracts\Api\V1\Spark\ExploreInterface;
use App\Filters\Api\V1\Spark\Category;
use App\Filters\Api\V1\Spark\Search;
use App\Filters\Api\V1\Spark\Status;
use App\Models\Spark;
use Illuminate\Pipeline\Pipeline;
use App\Utils\BaseService;

class ExploreService extends  BaseService  implements ExploreInterface
{

    public function handle($request)
    {
        try {
            $sparks = app(Pipeline::class)->send(Spark::query())
                ->through([
                    Category::class,
                    Status::class,
                    Search::class,
                ])->thenReturn()->with('category:id,name','user:id,username,name,image')
                ->selectRaw('
                    id,
                    user_id,
                    category_id,
                    title,
                    description,
                    visibility,
                    DATE_FORMAT(created_at, "%M %d, %Y %h:%i %p") as created
                ')->latest()->withCount(['likes as total_likes'])
                ->withCount(['comments as total_comments'])
                ->withCount(['views as total_views'])
                ->paginate(15);

            $data = preparePagination($sparks);

            return success(
                'Sparks fetched successfully. Explore the latest ideas shared by the community!',
                $data,
                200
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
