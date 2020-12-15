<?php

return [
  'sections' => [
      'app' => [
          'title' => 'Основные настройки',
          'descriptions' => 'Основные настройки сайта', // (optional)
          'icon' => 'fa fa-cog', // (optional)

          'inputs' => [
              [
                  'name' => 'site-title', // unique key for setting
                  'label' => 'Название сайта', // label for input
                  'type' => 'language-input',
                  // optional properties
                  'class' => 'form-control', // override global input_class
                  'style' => '', // any inline styles
              ],
              [
                  'name' => 'site-sub-title', // unique key for setting
                  'label' => 'Название сайта - подзаголовок', // label for input
                  'type' => 'language-input',
                  // optional properties
                  'class' => 'form-control', // override global input_class
                  'style' => '', // any inline styles
              ],
          ]
      ],
      'email' => [
          'title' => 'Email Settings',
          'descriptions' => 'How app email will be sent.',
          'icon' => 'fa fa-envelope',

          'inputs' => [
              [
                  'name' => 'from_email',
                  'type' => 'email',
                  'label' => 'From Email',
                  'placeholder' => 'Application from email',
                  'rules' => 'required|email',
              ],
              [
                  'name' => 'from_name',
                  'type' => 'text',
                  'label' => 'Email from Name',
                  'placeholder' => 'Email from Name',
              ]
          ]
      ]
  ],
];