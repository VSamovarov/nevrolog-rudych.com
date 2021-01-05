<?php

namespace App\Entity\Post;

use App\Entity\Post\Post;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Str;

class PostTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    // 'excerpt' => $translation->getExcerpt(),


    protected $fillable = ['lang','title', 'content', 'excerpt', 'metatitle', 'metadescription', 'metakeys'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }


    public function getSlugAttribute()
    {
      return Str::slug($this->title, '-') . Post::getIdPrefix() . $this->post_id;
    }

    /**
     * Формирует ссылку, в зависимости от роутера
     * актуально только для синг-постов
     * для списков будет показывать не корректные значения
     *
     * Важно для страниц
     */
    public function getUrlAttribute(): string
    {
      // $slug = $this->post->slug;
      $routeName = Str::after(request()->route()->getName(), '.');
      $parameters = request()->route()->parameters();
      //Обновляем ярлык, только в том случае, если есть типы
      if(request()->route()->hasParameter('slug') && request()->route()->hasParameter('type')) {
        $parameters = array_merge($parameters, ['slug'=>$this->slug]);
      }
      return t_route($routeName, $parameters, $this->lang, $absolute = true);
    }
}