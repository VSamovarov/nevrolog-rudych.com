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
                ->where('created_at	', '<=', Carbon::parse($value)->toDateString());
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
                ->where('created_at	', '>=', Carbon::parse($value)->toDateString());
        }
    }
}