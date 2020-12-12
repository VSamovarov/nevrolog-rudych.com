<?php

return [

    'types' => [
        'pages' => [
            'name' => 'Страницы',
            'taxonomy' => [],
            'icon' => 'bookmark',
        ],
        'news' => [
            'name' => 'Новости',
            'taxonomy' => [],
            'icon' => 'newspaper',
        ],
        'blogs' => [
            'name' => 'Блог',
            'taxonomy' => [],
            'icon' => 'journal',
        ]
    ],

    'statuses' => [
        'draft' => 'Черновик', #Черновик
        'publish' => 'Опубликован', #Опубликован
        'off' => 'Отключен', #Отключен
    ],
    'slugs' => [
        'main' => 'Главная страница',
        'contacts' => 'Контакты',
    ],

    'per_page' => 15,



];
