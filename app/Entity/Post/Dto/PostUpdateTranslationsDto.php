<?php

namespace App\Entity\Post\Dto;

class PostUpdateTranslationsDto
{
    private $lang;
    private $title;
    private $content;
    private $excerpt;
    private $metatitle;
    private $metadescription;
    private $metakeys;
    private $slug;

    public function __construct(array $data)
    {
        $this->lang = $data['lang'];
        $this->title = $data['title'] ?? null;
        $this->content = $data['content'] ?? null;
        $this->excerpt = $data['excerpt'] ?? null;
        $this->metatitle = $data['metatitle'] ?? null;
        $this->metadescription = $data['metadescription'] ?? null;
        $this->metakeys = $data['metakeys'] ?? null;
        $this->slug = $data['slug'] ?? null;
    }

    /**
     * Get the value of lang
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the value of metakeys
     */
    public function getMetakeys()
    {
        return $this->metakeys;
    }

    /**
     * Get the value of metadescription
     */
    public function getMetadescription()
    {
        return $this->metadescription;
    }

    /**
     * Get the value of metatitle
     */
    public function getMetatitle()
    {
        return $this->metatitle;
    }

    /**
     * Get the value of excerpt
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }
}