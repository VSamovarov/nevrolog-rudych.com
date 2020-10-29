<?php

namespace App\Entity\Post\Filters;

use App\Services\Filters\ModelFilter;
use Illuminate\Support\Carbon;

class PostFilters extends ModelFilter
{
    /**
     * До даты
     *
     * @param string|null  $value
     * @return void
     */
    public function dateTo(?string $value)
    {
        if (!empty($value)) {
            $this->query
                ->whereDate('posts.created_at', '<=', Carbon::parse($value)->toDateString());
        }
    }

    /**
     * C даты
     *
     * @param string|null  $value
     * @return void
     */
    public function dateFrom(?string $value)
    {
        if (!empty($value)) {
            $this->query
                ->whereDate('posts.created_at', '>=', Carbon::parse($value)->toDateString());
        }
    }

    /**
     * Статус
     *
     * @param string|null $value
     * @return void
     */
    public function status(?string $value)
    {
        if (empty($value)) {
            $this->query->status($value);
        }
    }

    /**
     * Поиск по таблице post_translations
     *
     * @param string|null $value
     * @param string|null $locale
     * @return void
     */
    public function q(?string $value, ?string $locale = null)
    {
        if (empty($locale)) {
            $locale = app()->getLocale();
        }
        if (!empty($value)) {
            $this->query
                ->orWhereTranslationLike('title', "%${$value}%", $locale)
                ->orWhereTranslationLike('content', "%${$value}%", $locale)
                ->orWhereTranslationLike('metakeys', "%${$value}%", $locale);
        }
    }

    /**
     * Поиск по title
     *
     * @param string|null $value
     * @param string|null $locale
     * @return void
     */
    public function title(?string $value, ?string $locale = null)
    {
        if (empty($locale)) {
            $locale = app()->getLocale();
        }
        if (!empty($value)) {
            $this->query->whereTranslationLike('title', "%${$value}%", $locale);
        }
    }

    /**
     * Поиск по content
     *
     * @param string|null $value
     * @param string|null $locale
     * @return void
     */
    public function content(?string $value, ?string $locale = null)
    {
        if (empty($locale)) {
            $locale = app()->getLocale();
        }
        if (!empty($value)) {
            $this->query->whereTranslationLike('content', "%${$value}%", $locale);
        }
    }
}
