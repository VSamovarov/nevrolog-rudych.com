<?php

namespace App\Entity\Feedback\Services;

use App\Entity\Feedback\Feedback;
use Illuminate\Http\Request;

class FeedbackQueries
{
    private $model;
    private $request;

    public function __construct(Request $request, Feedback $model)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function index(array $values = [], int $per_page = 0)
    {
        if (empty($values))  $values = $this->request->all();
        return $this->model::filter($values)->paginate($per_page);
    }
}