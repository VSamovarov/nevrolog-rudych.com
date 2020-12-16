<?php

namespace App\Services;

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
}
