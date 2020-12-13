<?php

namespace App\Http\Controllers\Post\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostTranslationResource extends JsonResource
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
            'title' => $this->title ?? '--Noname--',
            'lang' => $this->lang ?? app()->getLocale()
        ];
    }
}