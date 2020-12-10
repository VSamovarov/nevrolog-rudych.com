<?php

namespace App\Entity\Menu\Services;

use App\Entity\Menu\Menu;
use Barryvdh\LaravelIdeHelper\Console\MetaCommand;
use VSamovarov\LaravelLocalizer\Localizer;
class MenuQueries
{
  private $model;
  private $commands;
  private $locales;

  public function __construct(Menu $model, Localizer $localizer)
  {
    $this->model = $model;
    $this->locales = $localizer->getSlagsSupportedLocales();
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

  // /**
  //  * Получаем root меню по слагу
  //  *
  //  * @param [type] $slug
  //  * @return void
  //  */
  // public function getMenuBySlug(string $slug)
  // {
  //   return $this->model->where('slug', $slug)->where('parent_id',  NULL)->get();
  // }

  /**
   * Выводим дерево по слагу
   *
   * @return void
   */
  public function getMenuTreeArray($slug = 'main'): array
  {
    $node = $this->model->where('slug', $slug)->where('parent_id',  NULL)->first();
    if(empty($node->id)) {
      /**!  Добавляю запись в базу!!!! */
      $node = $this->createEmptyMenu($slug);
    }

    $tree = $this->model->with('translations')->descendantsAndSelf($node->id)->toTree()->toArray();
    return $this->treeAdapter($tree);
  }

  /**
   * Все дерьвья
   */
  public function getAllMenu(): array
  {
    $menu = [];
    $area = array_keys($this->getMenuArea());

    foreach ($area as  $slug) {
      $menu = array_merge ( $menu,  $this->getMenuTreeArray($slug));
    }

    return $menu;
  }
  /**
   * Меняем ключи для фронта
   * @param array $tree
   * @param array $exclude
   * @return array
   */
  private function treeAdapter(array $tree, array $exclude = ['_lft', '_rgt', 'translations']): array
  {
    $new = array();
    foreach($tree as $i=>$item) {
      foreach($item as $key=>$value) {
        if($key === 'children') {
          $key = 'menu';
          if(!empty($value)) {
            $value = $this->treeAdapter($value,$exclude );
          }
        }
        if($key === 'translations') {
          $new[$i] = array_merge($new[$i], $this->translationsAdapter($value));
        }
        if(!in_array($key, $exclude)) {
          $new[$i][$key] = $value;
        }

      }
    }
    return $new;
  }

  private function translationsAdapter(array $translations, $properties=['title']): array
  {
    $new = [];
    foreach($properties as $property) {
      foreach($translations as $translation) {
        $new[$property][$translation['lang']] = $translation[$property];
      }
    }
    return $new;
  }


    /**
   * Создаю пустое меню из настроек
   *
   * @param [type] $slug
   * @return void
   */
  private function createEmptyMenu($slug): Menu
  {
    $areas = $this->getMenuArea();
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
}
