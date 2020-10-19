<?php

namespace App\Services\Filters;

use ReflectionClass;

/**
 * Добавляет фильтры к Модели
 */
trait Filterable
{
    /**
     * Создает локальный scope фильтров
     *
     * @param $query
     * @param array $input
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeFilter($query, array $input = [])
    {
        $filterClassName = $this->getModelFilterClassName();
        // Create the model filter instance
        $modelFilter = new $filterClassName($query, $this->getFilterableParameters($input));
        return $modelFilter->handle();
    }

    /**
     * Имя класса, где описываются фильтры
     * Можно задать в переменной $this->ModelFilterClassName
     * или оно автоматически сгенерируется
     *
     * @return string
     */
    public function getModelFilterClassName(): string
    {
        if (empty($this->ModelFilterClassName)) {
            $class = new ReflectionClass($this);
            return $class->getNamespaceName() . '\\' . 'Filters' . '\\' . $class->getShortName() . 'Filters';
        } else {
            return $this->ModelFilterClassName;
        }
    }


    /**
     * Только разрешенные для фильтрации параметры
     *
     * @param array $input
     * @return void
     */
    public function getFilterableParameters($input = [])
    {
        $filterableParameters = $this->filterableParameters;
        return array_filter(
            $input,
            function ($param) use ($filterableParameters) {
                return in_array($param, $filterableParameters);
            },
            ARRAY_FILTER_USE_KEY
        );
    }
}