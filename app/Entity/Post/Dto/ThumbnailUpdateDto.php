<?php

namespace App\Entity\Post\Dto;

class ThumbnailUpdateDto
{
    private $path;
    private $name;

    public function __construct(?string $path, ?string $name)
    {
        $this->path = $path;
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPath()
    {
        return $this->path;
    }
}