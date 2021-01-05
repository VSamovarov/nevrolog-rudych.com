<?php

namespace App\Services;

use App\Entity\Post\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Helpers
 */

final class Helper
{
  public static function parsingMapsHtmlCode($string, $lang = 'en')
  {
    preg_match('/src="([^"]+)/', $string, $found);
    if ($lang && strripos($found[1], 'google') !== false) {
      $found[1] = preg_replace("{\!1suk}", "!1s{$lang}", $found[1]);
    }
    return $found[1];
  }

  /**
   * Очищаем телефон
   *
   * @param string $string
   * @return string
   */
  public static function clearPhone(?string $string): ?string
  {
    return preg_replace("{[^0-9]}", "", $string);
  }

  /**
   * Приводим имя файла к нормальному виду
   *
   * @param string $name
   * @param string $separator
   * @return string
   */
  public static function normalizeFileName(string $name, $separator = "-"): string
  {
    $ext = mb_substr(strrchr($name, '.'), 1);

    if (($ext_len = mb_strlen($ext)) > 0) {
      $basename = mb_substr($name, 0,  - ($ext_len));
      $name = Str::slug($basename, $separator) . '.' . Str::slug($ext);
    }

    return $name;
  }

  /**
   * Возвращаем локализованное значение
   */
  public static function getLocalized($value)
  {

    if(is_array($value)) {
      if(isset($value[app()->getLocale()])) {
        $value = $value[app()->getLocale()];
      } else {
        $value = array_shift($value);
      }
    }
    if(!is_string($value)) $value = '';
    return $value;
  }

  /**
   * Ищем ID в ярлыке
   *
   * @param string $slug - ярлык
   * @param string $prefix - 'blabla[--p]21"
   * @return integer|null
   */
  public static function getIdBySlug(string $slug, string $prefix): ?int
  {
    $id = null;
    if( ($pos = strrpos($slug, $prefix)) !== false ) {
      $id = substr($slug, $pos  + strlen($prefix));
      if(!is_numeric($id)) $id = null;
    }
    return $id;
  }


  /**
  * генерим многоязычные для постов
  *
  * @param Request $request
  * @param Post $post
  * @return array
  */
  public function localizedLinks(Request $request, Post $post): array
  {
    $links = [];
    $routeName = Str::after($request->route()->getName(), '.');
    $parameters = $request->route()->parameters();
    foreach (app('localizer')->getSupportedLocales() as $locale) {
      $parameters = array_merge($parameters, ['slug'=>$post->translateOrDefault()->slug ]);
      $links[$locale['slug']] = t_route($routeName, $parameters, $locale['slug'], $absolute = true);
    }
    return $links;
  }
}