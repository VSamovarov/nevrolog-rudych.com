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

    public function __construct($lang, $title, $content, $excerpt, $metatitle, $metadescription, $metakeys, $slug)
    {
        $this->lang = $lang;
        $this->title = $title;
        $this->content = $content;
        $this->excerpt = $excerpt;
        $this->metatitle = $metatitle;
        $this->metadescription = $metadescription;
        $this->metakeys = $metakeys;
        $this->slug = $slug;
    }
}