<?php

namespace App\Entity\Post\Requests;

use App\Entity\Post\Dto\PostUpdateDto;
use App\Entity\Post\Rules\SupportedLocaleCheckArrayKey;
use App\Entity\Post\Rules\PostStatus;
use App\Entity\Post\Rules\PostType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class PostUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'type' => ['required', 'string', app(PostType::class)],
            'post-status-module' => ['required', 'string', app(PostStatus::class)],
            'date-module' => 'date',
            'main-content-module.*' => [app(SupportedLocaleCheckArrayKey::class)],
            'seo-meta-data-module.*' => [app(SupportedLocaleCheckArrayKey::class)],
            'main-content-module.*.*' => 'nullable|string',
            'seo-meta-data-module.*.*' => 'nullable|string',
        ];
    }

    public function getDto(): PostUpdateDto
    {
        return new PostUpdateDto(
            $this->id,
            $this->type,
            $this->status,
            $this->created_at,
            $this->user_id,
            $this->order,
            $this->getTranslations($this->main, $this->seo)
        );
    }

    private function getTranslations()
    {
    }
}