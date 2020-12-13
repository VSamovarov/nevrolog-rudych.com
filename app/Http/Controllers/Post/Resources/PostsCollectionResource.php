<?php

namespace App\Http\Controllers\Post\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostsCollectionResource extends ResourceCollection
{
    public function toArray($request)
    {

        return
            $this->collection->transform(
                function ($item) {
                  return new PostResource($item);
                }
            );
    }
}