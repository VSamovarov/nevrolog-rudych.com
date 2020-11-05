<?php

namespace App\Entity\Post\Dto;

class PostUpdateDto
{
    private $type;
    private $status;
    private $created_at;
    private $user_id;
    private $order;
    private $translations;


    public function __construct(array $data, array $translations)
    {
        $this->type = $data['type'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->user_id = $data['user_id'] ?? null;
        $this->order = $data['order'] ?? null;
        $this->translations = $translations;
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
}