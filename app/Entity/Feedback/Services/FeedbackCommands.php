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

    /**
     * Массово удаляем
     *
     * @param array $ids
     * @return void
     */
    public function massDelete(array $ids)
    {
        /**
         * Удаленные, удаляем окончательно
         */
        $this->model::onlyTrashed()->whereIn('id', $ids)->forceDelete();
        /**
         * Soft Deleted
         */
        $this->model::whereIn('id', $ids)->delete();
    }

    /**
     * Массово восстанавливаем
     *
     * @param array $ids
     * @return void
     */
    public function massRestore(array $ids)
    {
        $this->model::onlyTrashed('id', $ids)->restore();
    }

    /**
     * Массово изменяем статус
     *
     * @param array $ids
     * @param boolean $status
     * @return void
     */
    public function massViewedStatus(array $ids, bool $status)
    {
        $status = $status ? 1 : 0;
        $this->model::whereIn('id', $ids)->update(['viewed' => $status]);
    }
}
