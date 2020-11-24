<?php

namespace App\Entity\Setting;

use Illuminate\Database\Eloquent\Model;

class SettingDescription extends Model
{
  /**
   * Отношения
   */
  public $timestamps = false;
  public function setting()
  {
    return $this->belongsTo(Setting::class);
  }
}