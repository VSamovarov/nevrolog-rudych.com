<?php

namespace App\Services;

use Illuminate\Support\Str;

/**
 * Helpers
 */

final class Helper
{
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

  public static function normalizeFileName(string $name, $separator = "-"): string
  {
    $ext = mb_substr(strrchr($name, '.'), 1);

    if (($ext_len = mb_strlen($ext)) > 0) {
      $basename = mb_substr($name, 0,  - ($ext_len));
      $name = Str::slug($basename, $separator) . '.' . Str::slug($ext);
    }

    return $name;
  }
}