<?php

namespace App\Entity\Menu\Services;

use App\Entity\Menu\Menu;

class MenuQueries
{
  private $model;

  public function __construct(Menu $model)
  {
    $this->model = $model;
  }

  /**
   * Получить настройки областей меню
   *
   * @return array|null
   */
  public function getMenuArea(): ?array
  {
    return $this->model->getMenuArea();
  }

  /**
   * Получаем root меню по слагу
   *
   * @param [type] $slug
   * @return void
   */
  public function getMenuBySlug(string $slug)
  {
    return $this->model->where('slug', $slug)->where('parent_id',  NULL)->get();
  }
}