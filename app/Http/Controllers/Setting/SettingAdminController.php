<?php

namespace App\Http\Controllers\Setting;

use App\Entity\Setting\Services\SettingCommands;
use App\Entity\Setting\Services\SettingQueries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingAdminController extends Controller
{
    public function index()
    {
      return Inertia::render(
        'Setting/IndexSetting',
        [
          'pageTitle' => "Настройки",
        ]
      );
    }
}