<?php

return [

    'types' => [
        'pages' => [
            'name' => 'Страницы',
            'taxonomy' => [],
            'icon' => 'bookmark',
            'generate-page-header-image' => true, //Из thumbnail-module
            'modules'=> [
              'date-module'=> true,
              'main-content-module'=> true,
              'post-status-module'=> true,
              'seo-meta-data-module'=> true,
              'modules-meta-data'=> true,
              'modules-meta-data'=> true,
              'thumbnail-module'=> true,
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
        ],
        'faq' => [
            'name' => 'Вопросы и ответы',
            'taxonomy' => [],
            'icon' => 'question-circle',
            'modules'=> [
              'date-module'=> false,
              'main-content-module'=> true,
              'post-status-module'=> true,
              'seo-meta-data-module'=> false,
              'modules-meta-data'=> false,
              'thumbnail-module'=> false,
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
        'news' => 'Новости',
        'articles' => 'Статьи',
        'faq' => 'Частые вопросы',
        'services' => 'Услуги',
    ],

    'per_page' => 15,



];