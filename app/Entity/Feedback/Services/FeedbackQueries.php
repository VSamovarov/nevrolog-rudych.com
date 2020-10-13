<?php

namespace App\Entity\Feedback\Services;

use App\Entity\Feedback\Feedback;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

/**
 * Различные выборки
 */
class FeedbackQueries
{
    private $model;
    private $request;

    public function __construct(Request $request, Feedback $model)
    {
        $this->model = $model;
        $this->request = $request;
    }

    /**
     * Формируем запрос
     *
     * @param array $values - значения фильтра
     * @return Builder
     */
    private function queryBuilder(array $values = []): Builder
    {
        if (empty($values)) $values = $this->request->all();
        if (isset($values['deleted'])) {
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
    public function index(array $values = [], $per_page = 0): object
    {
        $builder = $this->queryBuilder($values);
        return $builder->paginate($per_page);
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
     * Данные для меню на странице списка сущностей (INDEX)
     *
     * @param array $values
     * @param string $route_name
     * @return array
     */
    public function getAdminMenuIndex(array $values, string $route_name): array
    {
        /**
         * Оставляем только те параметры, которые определены в $this->model->filterableParameters
         */
        $values = $this->model->getFilterableParameters($values);
        return [
            [
                'name' => __('admin.all'),
                'count' => $this->count(),
                'url' => route($route_name)
            ],
            [
                'name' => __('admin.viewed'),
                'url' => route($route_name, Arr::add($values, 'viewed', 1)),
                'count' => $this->count(Arr::add($values, 'viewed', 1))
            ],
            [
                'name' => __('admin.not-viewed'),
                'url' => route($route_name, Arr::add($values, 'viewed', 0)),
                'count' => $this->count(Arr::add($values, 'viewed', 0))
            ],
            [
                'name' => __('admin.deleted'),
                'url' => route($route_name, Arr::add($values, 'deleted', '')),
                'count' => $this->count(Arr::add($values, 'deleted', ''))
            ],
        ];
    }
}
