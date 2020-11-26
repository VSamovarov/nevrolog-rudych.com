<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Services\AppSettings\ConfigSettings;
use Illuminate\Http\Request;
use Inertia\Inertia;
use QCod\Settings\Setting\SettingStorage;

class SettingAdminController extends Controller
{

  public function index(ConfigSettings $configSettings, SettingStorage $storage)
  {
    return Inertia::render(
      'Setting',
      [
        'pageTitle' => 'Настройки',
        'config' => $configSettings->getConfigs(),
        'settings' => $storage->all()
      ]
    );
  }

  // public function update(Request $request, ConfigSettings $configSettings)
  // {
  //   # code...
  // }
}