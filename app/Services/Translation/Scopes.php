<?php

namespace App\Services\Translation;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;

/**
 * Запросы к базе
 * https://github.com/Astrotomic/laravel-translatable/blob/master/src/Translatable/Traits/Scopes.php
 */

trait Scopes
{
    /**
     * Сортировка по полю таблицы перевода
     *
     * @param Builder $query
     * @param string $translationField - поле в таблице
     * @param string $sortMethod - (ask|desk)
     * @return Builder
     */
    public function scopeOrderByTranslation(Builder $query, string $translationField, string $sortMethod = 'asc'): Builder
    {
        $translationTable = $this->getTranslationsTable();

        if (!$this->isJoined($query, $translationTable)) {
            $localeKey = $this->getLocaleKey();
            $table = $this->getTable();
            $keyName = $this->getKeyName();

            $query->leftJoin($translationTable, function (JoinClause $join) use ($translationTable, $localeKey, $table, $keyName) {
                $join
                    ->on("{$translationTable}.{$this->getTranslationRelationKey()}", '=', "{$table}.{$keyName}")
                    ->where("{$translationTable}.{$localeKey}", $this->getLocale());
            });
        }
        return $query->orderBy("{$translationTable}.{$translationField}", $sortMethod);
    }

    /**
     * Общий вид запроса по таблице перевода
     *
     * @param Builder $query
     * @param string $translationField - поле в таблице
     * @param string $value - запрос
     * @param string|null $locale
     * @param string $method - (whereHas | orWhereHas)
     * @param string $operator - (=|like|...)
     * @return void
     */
    public function scopeWhereTranslation(Builder $query, string $translationField, string $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
    {
        return $query->$method('translations', function (Builder $query) use ($translationField, $value, $locale, $operator) {
            $query->where($this->getTranslationsTable() . '.' . $translationField, $operator, $value);

            if ($locale) {
                $query->where($this->getTranslationsTable() . '.' . $this->getLocaleKey(), $operator, $locale);
            }
        });
    }

    /**
     * Where Like (and)
     *
     * @param Builder $query
     * @param string $translationField
     * @param string $value
     * @param string|null $locale
     * @return void
     */
    public function scopeWhereTranslationLike(Builder $query, string $translationField, string $value, ?string $locale = null)
    {
        return $this->scopeWhereTranslation($query, $translationField, $value, $locale, 'whereHas', 'LIKE');
    }

    /**
     * Or Where Like (or)
     *
     * @param Builder $query
     * @param string $translationField
     * @param string $value
     * @param string|null $locale
     * @return void
     */
    public function scopeOrWhereTranslationLike(Builder $query, string $translationField, string $value, ?string $locale = null)
    {
        return $this->scopeWhereTranslation($query, $translationField, $value, $locale, 'orWhereHas', 'LIKE');
    }

    /**
     * Имя таблицы, в которой находятся переводы
     *
     * @return string
     */
    private function getTranslationsTable(): string
    {
        return app()->make($this->getTranslationModelName())->getTable();
    }


    /**
     * Helpers
     */

    /**
     * Проверьте, присоединилась ли таблица в Laravel Query Builder
     * https://gist.github.com/goranprijic/c578acb0086e8cd85179
     * if (!$this->isJoined('contents')) {
     * //
     * }
     */
    public function isJoined(Builder $query, $table)
    {
        return collect($query->getQuery()->joins)->pluck('table')->contains($table);
    }
}