<?php

namespace App\Http\Controllers\Post\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'date' => $this->date_add,
            'type' => $this->type,
            'status' => $this->status,
            $this->merge(
                function () {
                    return new PostTranslationResource($this->translation);
                }
            ),
        ];
    }
}