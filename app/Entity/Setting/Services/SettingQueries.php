<?php

namespace App\Entity\Setting\Services;

use App\Entity\Setting\Setting;

class SettingQueries
{
  private $model;

  public function __construct(Setting $model)
  {
    $this->model = $model;
  }

  public function index()
  {
    return $this->model->all();
  }
}