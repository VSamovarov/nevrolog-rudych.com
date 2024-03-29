<?php

namespace App\Entity\Post;

use App\Entity\Post\Traits\PostScope;
use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Filters\Filterable;
use App\Services\Translation\Translatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Spatie\Image\Manipulations;
use App\Entity\Post\Metadata;

class Post extends Model implements HasMedia
{
  use HasFactory;
  use SoftDeletes;
  use Filterable;
  use Translatable;
  use PostScope;
  use InteractsWithMedia;

  protected $dates = ['deleted_at'];

  protected $appends = ['date_add'];

  protected $filterableParameters = ['date_to', 'date_from', 'status', 'slug', 'q', 'title', 'content'];

  /**
   * Аксессоры
   */
  protected $casts = [
    'created_at' => 'datetime:Y-m-d',
  ];
  public function getDateAddAttribute($value)
  {
    return empty($this->created_at) ? null : $this->created_at->format('m-d-Y');
  }
  /**
   * Отношения
   */

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function metadata()
  {
    return $this->hasMany(Metadata::class);
  }

  protected static function boot()
  {
    parent::boot();
  }
  /**
   * Настройки
   */

  /**
   * Все типы постов (из настроек)
   *
   * @return array|null
   */
  public function getTypes(): ?array
  {
    return config('post_settings.types');
  }

  /**
   * Все настройки определенного типа поста
   *
   * @param string $type
   * @return array
   */
  public function getSettingsType(string $type): array
  {
    $types = $this->getTypes();
    return $types[$type]??[];
  }

  /**
   * Все статусы постов (из настроек)
   *
   * @return array|null
   */
  public function getStatuses(): ?array
  {
    return config('post_settings.statuses');
  }

    /**
   * Все статусы постов (из настроек)
   *
   * @return array|null
   */
  public function getSlugs(): ?array
  {
    return config('post_settings.slugs');
  }

  /**
   * Используем для идентификации в локализованных ярлыках
   *
   * @return string
   */
  static function getIdPrefix(): string
  {
    return config('post_settings.id-prefix','--p');
  }

  /**
   * Количество Постов на странице
   *
   * @return integer
   */
  public function getPerPage(): int
  {
    return config('post_settings.per_page');
  }

  /**
   *
   */

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('thumbnail')
      ->singleFile();

    $this->addMediaCollection('page-header')
      ->singleFile();

    $this->addMediaCollection('page-thumbnail')
      ->singleFile();

    $this->addMediaCollection('post-content');

    $this->addMediaCollection('post-common');
  }

  public function registerMediaConversions($media = null): void
  {
    $this->addMediaConversion('thumb')
      ->performOnCollections('thumbnail', 'page-thumbnail') //для других коллекций не будет выполняться
      ->width(700)
      ->height(350)
      ->sharpen(10)
      ->nonQueued()
      ->withResponsiveImages();

    $this->addMediaConversion('page-header')
      ->performOnCollections('page-header') //для других коллекций не будет выполняться
      ->fit(Manipulations::FIT_CROP, 2000, 500)
      ->sharpen(10)
      ->withResponsiveImages();


    $this->addMediaConversion('content')
      ->performOnCollections('post-content')
      ->withResponsiveImages()
      ->fit(Manipulations::FIT_MAX, 2000, 2000)
      ->nonQueued();

    $this->addMediaConversion('common')
      ->performOnCollections('post-common')
      ->withResponsiveImages()
      ->fit(Manipulations::FIT_MAX, 2000, 2000)
      ->nonQueued();
  }
}