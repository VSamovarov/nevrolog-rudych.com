<?php

namespace App\Entity\Post\Services;

use App\Entity\Post\Post;
use App\Services\Contracts\ServiceQueries;
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
        return $builder;
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
        return $this->queryBuilder($values)->with('translation')->paginate($per_page);
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
     * типы
     *
     * @return array|null
     */
    public function getTypes(): ?array
    {
        return $this->model->getTypes();
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
}