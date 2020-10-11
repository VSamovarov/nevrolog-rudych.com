<?php

namespace App\Entity\Feedback\Filters;

use App\Services\Filters\ModelFilter;

class FeedbackFilters extends ModelFilter
{
    public function viewed($value)
    {
        if (in_array($value, ["0", "1"])) {
            $this->query
                ->where('viewed', '=', $value);
        }
    }
}