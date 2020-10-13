<?php

namespace App\Entity\Feedback\Services;

use App\Entity\Feedback\Feedback;
use App\Services\Contracts\ServiceQueries;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Различные выборки
 */
class FeedbackQueries implements ServiceQueries
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
}