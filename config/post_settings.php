<?php

return [

    'types' => [
        'pages' => [
            'name' => 'Страницы',
            'taxonomy' => [],
            'icon' => 'bookmark',
            'modules'=> [
              'date-module'=> true,
              'main-content-module'=> true,
              'post-status-module'=> true,
              'seo-meta-data-module'=> true,
              'modules-meta-data'=> true,
              'modules-meta-data'=> true,
              'thumbnail-module'=> false,
            ]
        ],
        'news' => [
            'name' => 'Новости',
            'taxonomy' => [],
            'icon' => 'newspaper',
            'modules'=> [
              'date-module'=> true,
              'main-content-module'=> true,
              'post-status-module'=> true,
              'modules-meta-data'=> false,
              'thumbnail-module'=> true,
              'post-slug-module'=> false,
            ]

        ],
        'articles' => [
            'name' => 'Статьи',
            'taxonomy' => [],
            'icon' => 'journal',
            'modules'=> [
              'date-module'=> true,
              'main-content-module'=> true,
              'post-status-module'=> true,
              'seo-meta-data-module'=> true,
              'modules-meta-data'=> false,
              'thumbnail-module'=> true,
              'post-slug-module'=> false,
            ]
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
        'about' => 'Обо мне',
        'faq' => 'Частые вопросы',
        'services' => 'Услуги',
    ],

    'per_page' => 15,



];