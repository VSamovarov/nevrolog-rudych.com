<?php

namespace App\Entity\Menu;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\Translation\Translatable;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
  use Translatable;
  use HasFactory;
  use NodeTrait;
  protected $table = 'menu';
  public $timestamps = false;

  protected $fillable = ['order', 'url', 'slug'];

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
