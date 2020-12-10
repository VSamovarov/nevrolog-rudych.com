<?php

namespace App\Entity\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class MenuTranslation extends Model
{
  use HasFactory;
  public $timestamps = false;
  protected $fillable = ['title','lang'];
}
