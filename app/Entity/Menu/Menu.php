<?php

namespace App\Entity\Menu;

use App\Entity\Menu\Services\MenuQueries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\Translation\Translatable;
class Menu extends Model
{
  use Translatable;
  use HasFactory;
  public $timestamps = false;

  /**
   * Области меню
   *
   * @return array|null
   */
  public function getMenuArea(): ?array
  {
    return config('menu-front.menu-area');
  }
}
