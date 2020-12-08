<?php

namespace App\Entity\Post\Dto;

use App\Entity\Post\Dto\ThumbnailUpdateDto;

class PostUpdateDto
{
    private $type;
    private $status;
    private $created_at;
    private $user_id;
    private $order;
    private $translations;
    private $thumbnail;
    private $metadata;


    public function __construct(
      array $data,
      array $translations,
      ?ThumbnailUpdateDto $thumbnail,
      ?array $metadata
    )
    {
        $this->type = $data['type'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->user_id = $data['user_id'] ?? null;
        $this->order = $data['order'] ?? null;
        $this->translations = $translations;
        $this->thumbnail = $thumbnail;
        $this->metadata = $metadata;
    }



    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Get the value of order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Get the value of translations
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Get the value of translations
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

        /**
     * Get the value of translations
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
}
