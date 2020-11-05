<?php

namespace App\Entity\Post\Requests;

use App\Entity\Post\Dto\PostUpdateDto;
use App\Entity\Post\Dto\PostUpdateTranslationsDto;
use App\Entity\Post\Rules\SupportedLocaleCheckArrayKey;
use App\Entity\Post\Rules\PostStatus;
use App\Entity\Post\Rules\PostType;
use Illuminate\Foundation\Http\FormRequest;

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
        $type = $this->input('type');
        $status = $this->input('post-status-module');
        $created_at = $this->input('date-module');
        return new PostUpdateDto(
            compact('type', 'status', 'created_at'),
            $this->getTranslations(array_merge_recursive($this->input('seo-meta-data-module'), $this->input('main-content-module')))
        );
    }

    private function getTranslations($data)
    {
        $translations = [];
        foreach ($data as $lang => $translation) {
            $translations[] = new PostUpdateTranslationsDto(array_merge($translation, ['lang' => $lang]));
        }
        return $translations;
    }
}