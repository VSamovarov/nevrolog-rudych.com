<?php

namespace App\Entity\User\Services;

use App\Entity\User\User;

class UserQueries
{
  private $model;

  public function __construct(User $model)
  {
    $this->model = $model;
  }

  public function getUserByEmails(array $emails)
  {
    $this->model->whereIn('email', $emails)->get();
  }
}