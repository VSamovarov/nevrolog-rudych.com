<?php

namespace App\Services\Translation\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

interface Translation
{

    /**
     * Связь с таблицей, в которой находятся переводы
     * Все переводы
     *
     * @return HasMany
     */
    public function translations(): HasMany;

    /**
     * Связь с таблицей, в которой находятся переводы
     * Один перевод
     *
     * @return HasMany
     */
    public function translation(): HasOne;

    /**
     * Перевод, который соответствует конкретному языку
     *
     * @param string|null $lang
     * @return Model|null
     */
    public function translate(?string $lang): ?Model;

    /**
     * Перевод, который соответствует конкретному языку
     * или языку по умолчанию
     *
     * @param string|null $lang
     * @return Model|null
     */
    public function translateOrDefault(?string $lang): ?Model;
}