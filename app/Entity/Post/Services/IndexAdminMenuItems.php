<?php

namespace App\Entity\Post\Services;

/**
 * Пункты меню в админке, на странице списка постов
 */
class IndexAdminMenuItems
{
    /**
     * Задаем пункты меню
     *
     * @param PostQueries $queries
     * @return array
     */
    public function __invoke(PostQueries $queries): array
    {
        $items = [];

        $items[] = [
            'name' => 'all'
        ];

        foreach ($queries->getStatuses() as $status => $name) {
            $items[] = [
                'name' => $name,
                'parameter' => 'status',
                'value' => $status
            ];
        }

        $items[] = [
            'name' => 'deleted',
            'parameter' => 'deleted'
        ];

        return $items;
    }
}