<?php

namespace App\Entity\Menu\Services;
use App\Entity\Menu\Services\MenuQueries;
class MenuCommands
{
  private $queries;
  public function __construct(MenuQueries $queries)
  {
    $this->queries = $queries;
  }

  /**
   * Сохраняем меню
   *
   * @param array $menu
   * @return void
   */
  function saveMenu(array $menu): void
  {
    foreach($menu) {

    }
  }
}