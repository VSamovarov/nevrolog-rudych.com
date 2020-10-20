<?php

namespace App\Entity\Feedback\Services;

use App\Entity\Feedback\Feedback;
use App\Entity\Feedback\FeedbackCreateDto;

final class FeedbackCommands
{

    /**
     * Модель
     *
     * @var [Feedback]
     */
    private $model;

    public function __construct(Feedback $model)
    {
        $this->model = $model;
    }

    public function update(int $id, FeedbackCreateDto $dto)
    {
        $feedback = $this->model::findOrFail($id);
        $feedback->name = $dto->getName();
        $feedback->phone = $dto->getPhone();
        $feedback->email = $dto->getEmail();
        $feedback->message = $dto->getMessage();
        $feedback->created_at = $dto->getCreated_at();
        return $feedback->save();
    }
}
