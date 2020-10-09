<?php

namespace App\Services\Filters;

/**
 * Добавляет фильтры к Модели
 */
trait Filterable
{
    /**
     * Создает локальный scope.
     *
     * @param $query
     * @param array $input
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeFilter($query, array $input = [])
    {
        $filterClassName = $this->getModelFilterClassName();
        // Create the model filter instance
        $modelFilter = new $filterClassName($query, $input);
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
        return $this->ModelFilterClassName ?? __NAMESPACE__ . '\\Filters\\' . class_basename(get_class($this)) . 'Filters';
    }
}