<?php

namespace App\Entity\Post\Services;

use App\Entity\Post\Dto\PostUpdateDto;
use App\Entity\Post\Post;
use App\Entity\Post\Services\PostQueries;
use VSamovarov\LaravelLocalizer\Facades\Localizer;

class PostCommands
{
    private $queries;

    public function __construct(PostQueries $queries)
    {
        $this->queries = $queries;
    }

    /**
     * Сохраняем данные Post
     *
     * @param integer $id
     * @param PostUpdateDto $data
     */
    public function update(int $id, PostUpdateDto $data)
    {
        $post = Post::findOrFail($id);

        if ($data->getStatus()) $post->status = $data->getStatus();
        if ($data->getUser_id()) $post->user_id = $data->getUser_id();
        if ($data->getCreated_at()) $post->created_at = $data->getCreated_at();

        $post->save();

        foreach ($data->getTranslations() as $translation) {

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
    }
}