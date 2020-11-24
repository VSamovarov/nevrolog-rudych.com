<?php

return [

    'types' => [
        'pages' => [
            'name' => 'pages',
            'taxonomy' => [],
            'icon' => 'bookmark',
        ],
        'news' => [
            'name' => 'news',
            'taxonomy' => [],
            'icon' => 'newspaper',
        ],
        'blogs' => [
            'name' => 'blogs',
            'taxonomy' => [],
            'icon' => 'journal',
        ]
    ],

    'statuses' => [
        'draft' => 'draft', #Черновик
        'publish' => 'publish', #Опубликован
        'off' => 'off', #Отключен
    ],

    'per_page' => 15

];