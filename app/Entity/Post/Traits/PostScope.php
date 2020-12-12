<?php

namespace App\Entity\Post\Traits;

use Illuminate\Database\Eloquent\Builder;

trait PostScope
{
    /**
     * Тип поста
     *
     * @param Builder $query
     * @param string $type
     * @return Builder
     */
    public function scopeType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * Статус поста
     *
     * @param Builder $query
     * @param string|null $status
     * @return Builder
     */
    public function scopeStatus(Builder $query, ?string $status = null): Builder
    {
        if (empty($status)) {
            return $query;
        }
        return $query->where('status', '=', $status);
    }
}
