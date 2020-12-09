<?php

namespace App\Entity\Post\Services;

use App\Entity\Post\Dto\PostUpdateDto;
use App\Entity\Post\Dto\ThumbnailUpdateDto;
use App\Entity\Post\Post;
use App\Entity\Post\Services\PostQueries;
use App\Services\Storage\UploadTmpFiles;
use Illuminate\Support\Facades\Storage;
use App\Services\Helper;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostCommands
{
  private $queries;
  private $tmpStorage;

  public function __construct(PostQueries $queries)
  {
    $this->queries = $queries;
    $this->tmpStorage = Storage::disk(UploadTmpFiles::STORAGE_DISK);
  }

  /**
   * Сохраняем данные Post
   *
   * @param integer $id
   * @param PostUpdateDto $dto
   */
  public function update(int $id, PostUpdateDto $dto)
  {
    $post = Post::findOrFail($id);

    if ($dto->getStatus()) $post->status = $dto->getStatus();
    if ($dto->getUser_id()) $post->user_id = $dto->getUser_id();
    if ($dto->getCreated_at()) $post->created_at = $dto->getCreated_at();

    $post->save();

    foreach ($dto->getTranslations() as $translation) {

      $post->translations()->updateOrCreate(
        ['lang' => $translation->getLang()],
        [
          'title' => $translation->getTitle(),
          'content' => $translation->getContent(),
          'excerpt' => $translation->getExcerpt(),
          'metatitle' => $translation->getMetatitle(),
          'metadescription' => $translation->getMetadescription(),
          'metakeys' => $translation->getMetakeys(),
          'slug' => $translation->getSlug()
        ]
      );
    }

    $this->updateThumbnail($post, $dto->getThumbnail());
    $this->updateMetadata($post, $dto->getMetadata());

  }

  /**
   * Добавить миниатюру
   *
   * @param Post $post
   * @param ThumbnailUpdateDto $dto
   * @return void
   */
  private function updateThumbnail(Post $post, ?ThumbnailUpdateDto $dto, string $collectionName = 'thumbnail')
  {
    if ($dto === null) return;

    if (empty($dto->getPath())) { // Удаляем миниатюру (очищаем коллекцию)
      $post->clearMediaCollection($collectionName);
    } else { // Заменяем
      $post->addMedia($this->tmpStorage->path($dto->getPath()))
        ->usingFileName($dto->getName())
        ->toMediaCollection($collectionName);
    }
  }

  /**
   * Добавить картинку
   *
   * @param integer $id
   * @param string $patch
   * @param string|null $name
   * @param string $collection
   * @param string $conversions
   * @param array $size
   * @return Media
   */
  public function addImage(int $id, string $path, ?string $name = null, string $collection = 'post-content'): Media
  {
    $post = Post::findOrFail($id);
    $name = Helper::normalizeFileName($name ?? $path);
    $image = $post->addMedia($path)->usingFileName($name)->toMediaCollection($collection);
    return $image;
  }

  /**
   * Обновляем метаданные
   *
   * Удаляем все, вставляем новые
   *
   * @param Post $post
   * @param array|null $dto
   * @return void
   */
  public function updateMetadata(Post $post, ?array $dto): void
  {
    $post->metadata()->delete();
    foreach ($dto as $value) {
      $post->metadata()->create([
        '_title' => $value->get_title(),
        '_name' => $value->get_name(),
        '_value' => $value->get_value(),
        'order' =>  $value->getOrder(),
      ]);
    }
  }
}
