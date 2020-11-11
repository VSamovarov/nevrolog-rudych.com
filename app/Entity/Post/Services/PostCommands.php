<?php

namespace App\Entity\Post\Services;

use App\Entity\Post\Dto\PostUpdateDto;
use App\Entity\Post\Dto\ThumbnailUpdateDto;
use App\Entity\Post\Post;
use App\Entity\Post\Services\PostQueries;
use App\Services\Storage\UploadTmpFiles;
use Illuminate\Support\Facades\Storage;
use VSamovarov\LaravelLocalizer\Facades\Localizer;

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
}