<?php

namespace App\Entity\Post;

use App\Services\Translation\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Entity\Post\Post;

class Metadata extends Model
{
  use Translatable;
  public function post()
  {
    return $this->belongsTo(Post::class);
  }
}