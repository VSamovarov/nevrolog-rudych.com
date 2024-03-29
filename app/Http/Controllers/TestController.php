<?php

namespace App\Http\Controllers;

use App\Entity\Feedback\Feedback;
use App\Entity\Feedback\Services\FeedbackQueries;
use App\Entity\Menu\Menu;
use App\Entity\Menu\Services\MenuQueries;
use App\Entity\Post\Post;
use App\Entity\Post\Services\PostQueries;
use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\ConfigsLoader\ConfigsLoader;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
      $_value = '12345';

      $instance = app()->make(MenuQueries::class);
      $menu = $instance->getMenuTreeArray('main');
      $menu = array_shift($menu)['menu'];
      $menuMew = $this->setActiveItems($menu,request()->path());
      dd($menuMew);

    }

    /**
     * Добавляем атрибут 'active' пунктам меню
     * ! рекурсия
     *
     * @param array $menu
     * @param string $path
     * @return array
     */
    public function setActiveItems(array $menu, string $path): array
    {
      $path = trim($path,'/');
      foreach($menu as $i=>$item) {
        if($path === trim($item['url'],'/')) { //!<-Тут проверка на совпадение
          $menu[$i]['active'] = true;
          return $menu;
        }
        if(!empty($menu[$i]['menu'])) {
          $childrenMenu = $this->setActiveItems($menu[$i]['menu'], $path);
          foreach($childrenMenu as $childrenMenuItem) {
            if(!empty($childrenMenuItem['active'])) {
              $menu[$i]['active'] = true;
              $menu[$i]['menu'] = $childrenMenuItem;
            }
          }
        }
      }
      return $menu;
    }
}