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
use VSamovarov\LaravelLocalizer\Localizer;

class PostCommands
{
  private $tmpStorage;
  private $localizer;

  public function __construct(Localizer $localizer)
  {
    $this->tmpStorage = Storage::disk(UploadTmpFiles::STORAGE_DISK);
    $this->localizer = $localizer;
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

    /**
     * ! Прежде чем сохранить ярлык, отвязываем его от других постов
     */
    if ($dto->getSlug() !== $post->slug) {
      if(empty($dto->getSlug())) {
          $post->slug = null;
      } else {
        Post::where('slug', $dto->getSlug())->update(['slug' => null]);
        $post->slug = $dto->getSlug();
      }

    }

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
    if($dto) {
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

  /**
   * Удаление
   *
   * @param integer $id
   * @return void
   */
    public function destroy(int $id)
    {
        $item = Post::withTrashed()->findOrFail($id);
        if ($item->trashed()) {
            return $item->forceDelete();
        } else {
            $item->slug = null;
            $item->save();
            return $item->delete();
        }
    }

    /**
     * Восстановление удаленного (soft deleted)
     *
     * @param integer $id
     * @return void
     */
    public function restore(int $id)
    {
        $item = Post::withTrashed()->findOrFail($id);
        return $item->restore();
    }

    /**
     * Массово удаляем
     *
     * @param array $ids
     * @return void
     */
    public function massDelete(array $ids)
    {
      /**
       * Отвязываем все Ярлыки
       */

       Post::whereIn('id', $ids)->update(['slug' => null]);
      /**
       * Удаленные, удаляем окончательно
       */
      Post::onlyTrashed()->whereIn('id', $ids)->forceDelete();
      /**
       * Soft Deleted
       */
      Post::whereIn('id', $ids)->delete();
    }

    /**
     * Массово восстанавливаем
     *
     * @param array $ids
     * @return void
     */
    public function massRestore(array $ids)
    {
        Post::onlyTrashed('id', $ids)->restore();
    }

    public function create(string $type)
    {
      $item =  new Post;
      $item->type = $type;
      $item->status = 'draft';
      $item->user_id = request()->user()->id;
      $item->save();

      foreach($this->localizer->getSlagsSupportedLocales() as $lang) {
        $item->translations()->create(
          [
            'lang' => $lang,
            'title' => 'New document',
          ]
        );
      }
      return $item;
    }
}