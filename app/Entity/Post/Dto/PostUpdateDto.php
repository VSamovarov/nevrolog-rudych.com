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
    private $id;


    public function __construct($id, $type, $status, $created_at, $user_id, $order, $translations)
    {
        $this->type = $type;
        $this->created_at = $created_at;
        $this->status = $status;
        $this->user_id = $user_id;
        $this->order = $order;
        $this->translations = $translations;
        $this->id = $id;
    }
}