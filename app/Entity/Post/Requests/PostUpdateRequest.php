<?php

namespace App\Entity\Post\Requests;

use App\Entity\Post\Dto\MetadataUpdateDto;
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
use Illuminate\Support\Str;

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
      'post-slug-module' => 'nullable|sometimes|unique:posts,slug',
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
      'metadata' => 'nullable|array',
      'metadata.*._name' => 'exclude_if:metadata,array|required|string',
      'metadata.*._title' => 'exclude_if:metadata,array|string',
      'metadata.*._value' => 'exclude_if:metadata,array|required|array',
    ];
  }

  public function getDto(): PostUpdateDto
  {
    $type = $this->input('type');
    $slug = $this->input('post-slug-module')? Str::slug($this->input('post-slug-module')) : null;
    $status = $this->input('post-status-module');
    $created_at = $this->input('date-module');
    return new PostUpdateDto(
      compact('type', 'slug', 'status', 'created_at'),
      $this->getTranslationsDto(array_merge_recursive($this->input('seo-meta-data-module'), $this->input('main-content-module'))),
      $this->getThumbnailDto($this->input('thumbnail-module')),
      $this->getMetadataDto($this->input('metadata'))
    );
  }

  private function getTranslationsDto($data)
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

  /**
   * Готовим DTO метаданных
   *
   * @param [type] $data
   * @return void
   */
  private function getMetadataDto($data): ?array
  {
    $metadata = [];
    if (empty($data)) {
      return null;
    }
    foreach ($data as $i => $value) {
      $metadata[] = new MetadataUpdateDto($value['_name'], $value['_title'], $value['_value'], $i );
    }
    return $metadata;
  }
}
