<?php

namespace App\Entity\Post;
use Illuminate\Database\Eloquent\Model;
use App\Entity\Post\Post;

class Metadata extends Model
{
  private $cats = [
    'value' => 'array'
  ];
  public function post()
  {
    return $this->belongsTo(Post::class);
  }
}