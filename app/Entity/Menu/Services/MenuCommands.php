<?php

namespace App\Entity\Menu\Services;

use App\Entity\Menu\Menu;
use App\Entity\Menu\Services\MenuQueries;
use VSamovarov\LaravelLocalizer\Localizer;

class MenuCommands
{
  private $model;
  private $queries;
  private $allowedAreas;
  private $locales;
  public function __construct(Menu $model, MenuQueries $queries, Localizer $localizer)
  {
    $this->model = $model;
    $this->queries = $queries;
    $this->allowedAreas = array_keys($this->queries->getMenuArea());
    $this->locales = $localizer->getSlagsSupportedLocales();
  }

  /**
   * Создаю пустое меню из настроек
   *
   * @param [type] $slug
   * @return void
   */
  public function createEmptyMenu($slug): Menu
  {
    $areas = $this->queries->getMenuArea();
    if(isset($areas[$slug])) {
      $attributes =  [
        'order'=>10,
        'url'=>null,
        'slug'=>$slug
      ];
      $node = new $this->model(
        $attributes
      );
      $node->save();

      foreach($this->locales as $lang) {
        $node->translations()->updateOrCreate(
          ['lang' => $lang],
          [
            'title' => $areas[$slug]??null
          ]
          );
      }
    }
    return $node;
  }
  public function save(array $menu): void
  {
    //Если изменилась конфигурация, и стало меньше областей - удаляем лишне
    $areas = array_keys($this->queries->getMenuArea());
    $menuFiltrable = array_filter($menu,  function($item) use ($areas) {
      return in_array($item['slug'], $areas);
    });
    $this->deleteMenu();
    $areas = $this->queries->getMenuArea();
    $this->saveMenu($menuFiltrable);
  }
  /**
   * Сохраняем меню
   * Рекурсивная функция
   *
   * @param array $menu
   * @return void
   */
  private function saveMenu(array $menu, $parent = null): void
  {

    foreach ($menu as $order=>$item) {
        $attributes =  [
            'order'=>$order,
            'url'=>$item['url']??null,
            'slug'=>$item['slug']??null
        ];
        $node = new $this->model(
          $attributes
        );
        if($parent) {
          $node->parent_id = $parent->id;
        }
        $node->save();
        $this->saveTranslations($node,$item);
        if(!empty($item['menu'])) {
          $this->saveMenu($item['menu'], $node);
        }
    }
  }

  private function saveTranslations($node, $item):void
  {
    foreach($this->locales as $lang) {
      $node->translations()->updateOrCreate(
        ['lang' => $lang],
        [
          'title' => $item['title'][$lang]??null
        ]
        );
    }
  }

  private function deleteMenu()
  {
    $this->model->rebuildTree([], $delete=true);
  }

}