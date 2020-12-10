<?php

namespace App\Http\Controllers;

use App\Entity\Feedback\Feedback;
use App\Entity\Feedback\Services\FeedbackQueries;
use App\Entity\Menu\Menu;
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

      $menu = Menu::with('translations')->get()->toTree()->toArray();
      dump($menu);
      $menuNew = $this->array_map_deep($menu);
      dd($menuNew );
      // dump($load->get(app_path('Services/AppSettings/config'),true));
      // dump($load->get(app_path('Services/AppSettings/config')));
      // dump($load->get(app_path('Services/AppSettings/config')));
      // dump($load->get(app_path('Services/AppSettings/config')));
      // dump($load->get(app_path('Services/AppSettings/config')));
      // dump($load->get(app_path('Services/AppSettings/config')));
    }

    private function array_map_deep($array, $exclude = ['_lft', '_rgt']) {
      $new = array();
      foreach($array as $i=>$item) {
        foreach($item as $key=>$value) {
          if($key === 'children') {
            $key = 'menu';
            if(!empty($value)) {
              $value = $this->array_map_deep($value,$exclude );
            }
          }
          if(!in_array($key, $exclude)) {
            $new[$i][$key] = $value;
          }

        }
      }
      return $new;
    }
}
