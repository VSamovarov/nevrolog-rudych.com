<?php

return [
    'types' => [
        'pages' => [
            'name' => 'post.type.pages',
            'taxonomy' => [],
            'icon' => 'bookmark',
        ],
        'news' => [
            'name' => 'post.type.news',
            'taxonomy' => [],
            'icon' => 'newspaper',
        ],
        'blogs' => [
            'name' => 'post.type.blogs',
            'taxonomy' => [],
            'icon' => 'journal',
        ]
    ],

    'statuses' => [
        'draft' => 'admin.statuses.draft', #Черновик
        'publish' => 'admin.statuses.publish', #Опубликован
        'off' => 'admin.statuses.off', #Отключен
    ],

];