<?php

namespace App\Services\Menu;

use App\Entity\Post\Post;

class MainAdminMenu
{
    private $request;
    private $post;
    public function __construct()
    {
        $this->request = request();
        $this->post = new Post();
    }

    /**
     * Пункты меню типов постов
     *
     * @return array
     */
    public function getPostMenuItems(): array
    {
        $items = [];
        foreach ($this->post->getTypes() as $type => $data) {
            $items[] = [
                'title' => $data['name'],
                'href' => route('admin.post.index', ['type' => $type]),
                'active' => $this->request->has('type') && $this->request->input('type') === $type,
                'icon' => $data['icon'] ?? false
            ];
        }
        return $items;
    }

    public function getItems()
    {
        $items = [];

        $items[] = [
            'title' => 'Обратная связь',
            'href' => route('admin.feedback.index'),
            'active' => $this->request->is('*/feedback'),
            'icon' => 'chat-right'
        ];
        $items = array_merge($items, $this->getPostMenuItems());

        $items[] = [
            'title' => 'Настройки',
            'href' => '/admin/setting',
            'active' => $this->request->is('*/setting'),
            'icon' => 'gear'
        ];

        $items[] = [
          'title' => 'Меню',
          'href' => '/admin/menu',
          'active' => $this->request->is('*/menu'),
          'icon' => 'ui-radios'
        ];
        return  $items;
    }
}