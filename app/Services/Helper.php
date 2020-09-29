<?php

namespace App\Services;

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
    public static function clearPhone(string $string): string
    {
        return preg_replace("{[^0-9]}", "", $string);
    }
}
