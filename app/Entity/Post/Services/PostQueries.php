<?php

namespace App\Entity\Post\Services;

use App\Entity\Post\Post;
use App\Services\Contracts\ServiceQueries;
use App\Services\Helper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use VSamovarov\LaravelLocalizer\Localizer;

/**
 * Различные выборки
 */
final class PostQueries implements ServiceQueries
{
  private $model;
  private $locale;
  private $request;

  public function __construct(Request $request, Post $model, Localizer $localizer)
  {
    $this->model = $model;
    $this->request = $request;
    $this->locale = $localizer->getLocale();
  }

  /**
   * Все статусы
   *
   * @return array
   */
  public function getStatuses(): array
  {
    return $this->model->getStatuses();
  }

  /**
   * Все ярлыки
   *
   * @return array
   */
  public function getSlugs(): array
  {
    return $this->model->getSlugs();
  }

  /**
   * Формируем запрос
   *
   * @param array $values - значения фильтра
   * @return Builder
   */

  private function queryBuilder(array $values): Builder
  {
    if (array_key_exists('deleted', $values)) {
      $builder = $this->model::onlyTrashed()->filter($values);
    } else {
      $builder = $this->model::filter($values);
    }
    return $builder->type($values['type']);
  }

  /**
   * Список сущностей с пагинацией
   *
   * @param array $values - значения фильтра
   * @param integer $per_page - количество на одой странице
   * @return object
   */
  public function index(array $values = [], ?int $per_page = null): object
  {
    if (empty($per_page)) $per_page = $this->model->getPerPage();
    return $this->queryBuilder($values)->with('translation','media')->paginate($per_page);
  }

  /**
   * Все данные сущности по ID
   *
   * @param integer $id
   * @param boolean $withTrashed
   * @return Post
   */
  public function byId(int $id, bool $withTrashed = false): Post
  {
    if ($withTrashed) {
      $post = $this->model->withTrashed()->findOrFail($id);
    } else {
      $post = $this->model->findOrFail($id);
    }
    return $this->loadPostData($post);
  }

  /**
   * Возвращаем данные по ярлыку
   *
   * @param string $slug
   * @return Post
   */
  public function getBySlug(string $slug): Post
  {

    $id = Helper::getIdBySlug($slug, $this->getIdPrefix());
    if(empty($id)) {
      $post = $this->model->where('slug',$slug)->first();
      if(!$post) abort(404);
      return $this->loadPostData($post);
    } else {
      return $this->byId($id);
    }
  }

  private function loadPostData(Post $post): Post
  {
    $post->load('translations', 'metadata', 'media');
    if(empty($post->getSettingsType($post->type)['generate-page-header-image'])) {
      $post->thumbnail = $post->getMedia('thumbnail')[0]??null;
    } else {
      $post->thumbnail = $post->getMedia('page-header')[0]??null;
    }

    if(!empty($post->metadata)) {
      foreach($post->metadata as $data) {
        $data->add_data = $this->metadataAddons($data);
      }
    }
    return $post;
  }
  /**
   * Количество сущностей
   *
   * @param array $values - значения фильтра
   * @return integer
   */
  public function count(array $values = []): int
  {
    $builder = $this->queryBuilder($values);
    return $builder->count();
  }

  /**
   * Все данные по всем типам поста
   *
   * @return array|null
   */
  public function getTypes(): ?array
  {
    return $this->model->getTypes();
  }

  /**
   * Возвращаем данные определенного типа
   *
   * @param string $type
   * @return array|null
   */
  public function getType(string $type): ?array
  {
    $types = $this->getTypes();
    if($types === null ) return null;
    if(!empty($types)) {
      return $types[$type]??null;
    }
  }

  /**
   * Количество Постов на странице
   *
   * @return integer
   */
  public function getPerPage(): int
  {
    return $this->model->getPerPage();
  }

  /**
   * Используем для идентификации в локализованных ярлыках
   *
   * @return string
   */
  public function getIdPrefix(): string
  {
    return $this->model->getIdPrefix();
  }


  /**
   * Дополнительные данные для метаданных
   * ! Необходим рефакторинг
   */

  public function metadataAddons($item)
  {
    // dd($item->_name);
    $data = [];
    switch ($item->_name) {
      case 'LastNews':
        $data = $this->queryBuilder(['type'=>'news','status'=>'publish'])->with('translation','media')->limit('2')->get();
        break;

      default:
        # code...
        break;
    }
    return $data;
  }
}