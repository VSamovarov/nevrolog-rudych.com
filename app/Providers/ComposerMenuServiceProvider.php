<?php

namespace App\Providers;

use App\Entity\Menu\Services\MenuQueries;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ComposerMenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      View::composer('front.layouts.main', function($view) {
        $view->with(['mainMenuItems' => $this->getMenu('main')]);
      });
    }

    private function getMenu($slug)
    {
      $instance = $this->app->make(MenuQueries::class);
      $menu = $instance->getMenuTreeArray($slug);
      $menu = $this->setActiveItems(array_shift($menu)['menu'],request()->path());
      return $menu;
    }

    /**
     * Добавляем атрибут 'active' пунктам меню
     * ! рекурсия
     *
     * @param array $menu
     * @param string $path
     * @return array
     */
    private function setActiveItems(array $menu, string $path): array
    {
      $path = trim($path,'/');
      $localePrefix = app('localizer')->getLocale();
      if(app('localizer')->isHideDefaultLocaleInURL() && $localePrefix === app('localizer')->getDefaultLocale()) $localePrefix = '';
      foreach($menu as $i=>$item) {
        $url = $item['url'][app('localizer')->getLocale()]??null;
        if($url && $path === trim($url,'/')) { //!<-Тут проверка на совпадение
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
