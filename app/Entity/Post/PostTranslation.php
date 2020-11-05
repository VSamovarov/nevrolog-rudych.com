<?php

namespace App\Entity\Post;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    // 'excerpt' => $translation->getExcerpt(),
    protected $fillable = ['title', 'content', 'excerpt', 'metatitle', 'metadescription', 'metakeys', 'slug'];
}