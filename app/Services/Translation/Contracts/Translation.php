<?php

namespace App\Services\Translation\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface Translation
{

    /**
     * Связь с таблицей, в которой находятся переводы
     *
     * @return HasMany
     */
    public function translations(): HasMany;

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