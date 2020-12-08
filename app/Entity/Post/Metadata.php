<?php

namespace App\Entity\Post;
use Illuminate\Database\Eloquent\Model;
use App\Entity\Post\Post;

class Metadata extends Model
{
  protected  $casts  = [
    '_value' => 'array'
  ];
  protected $fillable = ['_title', '_name', '_value', 'order'];
  public function post()
  {
    return $this->belongsTo(Post::class);
  }
}