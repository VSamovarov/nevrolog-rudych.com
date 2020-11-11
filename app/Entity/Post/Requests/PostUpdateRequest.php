<?php

namespace App\Entity\Post\Requests;

use App\Entity\Post\Dto\PostUpdateDto;
use App\Entity\Post\Dto\PostUpdateTranslationsDto;
use App\Entity\Post\Dto\ThumbnailUpdateDto;
use App\Entity\Post\Rules\SupportedLocaleCheckArrayKey;
use App\Entity\Post\Rules\PostStatus;
use App\Entity\Post\Rules\PostType;
use App\Services\Storage\UploadTmpFiles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use App\Services\Helper;

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
            'thumbnail-module.name' => 'nullable|string',
            'thumbnail-module.path' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (!Storage::disk(UploadTmpFiles::STORAGE_DISK)->exists($value)) {
                        $fail("{$attribute}: file is not exists");
                    }
                }
            ],
        ];
    }

    public function getDto(): PostUpdateDto
    {
        $type = $this->input('type');
        $status = $this->input('post-status-module');
        $created_at = $this->input('date-module');
        return new PostUpdateDto(
            compact('type', 'status', 'created_at'),
            $this->getTranslations(array_merge_recursive($this->input('seo-meta-data-module'), $this->input('main-content-module'))),
            $this->getThumbnailDto($this->input('thumbnail-module'))
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

    private function getThumbnailDto($data)
    {
        if (empty($data)) {
            return null;
        }
        if (!empty($data['name'])) $data['name'] = Helper::normalizeFileName($data['name']);
        return new ThumbnailUpdateDto($data['path'] ?? null, $data['name'] ?? null);
    }
}