<?php

namespace App\Entity\Setting;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  /**
   * Отношения
   */
  public $timestamps = false;
  public function description()
  {
    return $this->hasOne(SettingDescription::class);
  }
}