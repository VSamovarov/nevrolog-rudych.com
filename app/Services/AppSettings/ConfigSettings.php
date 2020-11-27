<?php

namespace App\Services\AppSettings;

use App\Services\ConfigsLoader\ConfigsLoader;
use Exception;
use Illuminate\Support\Collection;
use QCod\Settings\Setting\SettingStorage;

class ConfigSettings
{
  private $configs;
  private $storage;
  private $folderConfigs = 'config';

  public function __construct(ConfigsLoader $configsLoader, SettingStorage $storage)
  {
    $this->configs = collect($configsLoader->get(__DIR__. '/' . $this->folderConfigs,true));
    $this->storage = $storage;
  }

  /**
   * Настройки
   * можно только определенной группы (файла)
   *
   * @param string|null $group
   * @return Collection|null
   */
  public function getConfigs(?string $group = null): ?Collection
  {
    if(empty($group)) {
      return $this->configs;
    } else {
      return $this->configs->only([$group]);
    }
  }

  /**
   * Все названия групп
   *
   * @return void
   */
  public function getGroupSettings()
  {
    return $this->getConfigs()->keys();
  }

  /**
   * Возвращаем все правила валидации
   *
   * @param string|null $group
   * @return void
   */
  public function getValidationRules(?string $group = null): array
  {
    return $this->getConfigs($group)
          ->flatten(2)
          ->pluck('inputs')
          ->flatten(1)
          ->pluck('rules','name')
          ->reject(function ($val) {
              return is_null($val);
          })
          ->toArray();
  }



  /**
   * Получаем описание всех полей
   *
   * @param string|null $group
   * @return void
   */
  private function getAllSettingFields(?string $group = null): array
  {
    return $this->getConfigs($group)
      ->flatten(2)
      ->pluck('inputs')
      ->flatten(1)
      ->toArray();
  }


  //=======
    /**
   * Save incoming settings
   *
   * @param $request \Illuminate\Http\Request
   */
  public function save($request): void
  {
    // get all defined settings from config
    $allDefinedSettings = $this->getAllSettingFields();


    foreach($allDefinedSettings as $setting)
    {
        $settingName = $setting['name'];
        $type = $setting['type'];
        switch ($type) {
          case 'image':
          case 'file':
            // !Нереализованный функционал
            // TODO: Загрузка файлов
            // TODO: Загрузка картинок, с генерацией привью и трансформацией
            $this->uploadFile($setting, $request);
            break;
          case 'checkbox':
            $value = $request->has($settingName)? true : false;
          default:
            $value = $request->input($settingName)?? null;
            break;
        }
        $value = $request->get($settingName);
        $this->storage->set($settingName, $value);
        $this->cleanUpSettings();
    }
  }

  /**
   * Upload a file
   *
   * @param $setting array
   * @param $request \Illuminate\Http\Request
   * @return string|null
   */
  private function uploadFile($setting, $request): string
  {
    throw new Exception('Method --uploadFile-- not implemented yet');
    return '';
  }

  /**
   * Чистим таблицу Setting
   * Убиваем поля, которые отсутствуют в конфиге
   */
  private function cleanUpSettings(): void
  {
    $allDefinedSettings = collect($this->getAllSettingFields());
    $this->storage->all($fresh = true)
      ->keys()->diff($allDefinedSettings->pluck('name'))
      ->each(
        function ($field) {$this->storage->remove($field);
    });
  }
}