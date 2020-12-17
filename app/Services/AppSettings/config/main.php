<?php

return [
  'sections' => [
      'app' => [
          'title' => 'Основные настройки',
          'descriptions' => 'Основные настройки сайта', // (optional)

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
          'title' => 'Почтовый ящик для обратной связи',
          // 'descriptions' => 'How app email will be sent.',

          'inputs' => [
              [
                  'name' => 'site-email-from',
                  'type' => 'language-input',
                  'label' => 'От кого, в заголовке письма',
                  'rules' => '',
              ],
              [
                  'name' => 'site-email-first',
                  'type' => 'email',
                  'label' => 'Главный email',
                  'placeholder' => 'Application from email',
                  'rules' => '',
              ],
              [
                  'name' => 'site-email-two',
                  'type' => 'email',
                  'label' => 'Второстепенный email',
                  'placeholder' => 'Application from email',
                  'rules' => '',
              ]
          ]
      ],
      'phones' => [
          'title' => 'Телефоны для обратной связи',
          // 'descriptions' => 'How app email will be sent.',

          'inputs' => [
              [
                  'name' => 'site-phone-first',
                  'type' => 'text',
                  'label' => '',
                  'rules' => '',
              ],
              [
                  'name' => 'site-phone-two',
                  'type' => 'text',
                  'label' => '',
                  'rules' => '',
              ],
              [
                  'name' => 'site-phone-three',
                  'type' => 'text',
                  'label' => '',
                  'rules' => '',
              ]
          ]
      ],
      'address' => [
          'title' => 'Адрес',
          // 'descriptions' => 'How app email will be sent.',

          'inputs' => [
              [
                  'name' => 'site-address',
                  'type' => 'language-textarea',
                  'label' => 'Адрес',
                  'rules' => '',
              ],
              [
                  'name' => 'site-address-map',
                  'type' => 'textarea',
                  'label' => 'Карта - код Google Maps',
                  'rules' => '',
              ],
          ]
      ],
      'social' => [
          'title' => 'Социальные сети',
          // 'descriptions' => 'How app email will be sent.',

          'inputs' => [
              [
                  'name' => 'site-instagram',
                  'type' => 'text',
                  'label' => 'Instagram',
                  'rules' => '',
              ],
              [
                  'name' => 'site-facebook',
                  'type' => 'text',
                  'label' => 'Facebook',
                  'rules' => '',
              ],
          ]
      ]
  ],
];
