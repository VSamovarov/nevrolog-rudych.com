<?php

namespace App\Entity\Feedback\Filters;

use App\Services\Filters\ModelFilter;
use Illuminate\Support\Carbon;

class FeedbackFilters extends ModelFilter
{
    /**
     * Просмотренные
     *
     * @param string|null $value
     * @return void
     */
    public function viewed(?string $value)
    {
        if (in_array($value, ["0", "1"])) {
            $this->query
                ->where('viewed', '=', $value);
        }
    }

    /**
     * По имени
     *
     * @param string|nul $value
     * @return void
     */
    public function name(?string $value)
    {
        if (!empty($value)) {
            $this->query
                ->where('name', 'like', "%{$value}%");
        }
    }

    /**
     * По телефону
     *
     * @param string|null  $value
     * @return void
     */
    public function phone(?string $value)
    {
        if (!empty($value)) {
            $this->query
                ->where('phone', 'like', "%{$value}%");
        }
    }

    /**
     * По телефону
     *
     * @param string|null  $value
     * @return void
     */
    public function email(?string $value)
    {
        if (!empty($value)) {
            $this->query
                ->where('email', 'like', "%{$value}%");
        }
    }


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