<?php

namespace App\Services\Contracts;


interface ServiceQueries
{
    /**
     * Список сущностей с пагинацией
     *
     * @param array $values - значения фильтра
     * @param integer $per_page - количество на одной странице
     * @return object
     */
    public function index(array $values = [], $per_page = 0): object;

    /**
     * Количество сущностей
     *
     * @param array $values - значения фильтра
     * @return integer
     */
    public function count(array $values = []): int;
}
