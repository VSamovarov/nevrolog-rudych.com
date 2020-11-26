<?php

namespace App\Services\ConfigsLoader;

use Illuminate\Support\Facades\Cache;
use SplFileInfo;
use Symfony\Component\Finder\Finder;

class ConfigsLoader
{

  protected $settingsCacheKey = 'configs-loader';

  /**
   * Получаем данные из конфиг файлов
   *
   * @param string $folder
   * @param boolean $fresh
   * @return array
   */
  public function get(string $folder, bool $fresh = false): array
  {
    $cacheKey = "{$this->settingsCacheKey}:{$folder}";
    if($fresh) {
      Cache::forget($cacheKey);
    }
    return Cache::rememberForever($cacheKey, function () use ($folder) {
        return $this->getConfiguration($folder);
    });
  }

  /**
   * Выгружаем данные из конфиг файлов
   *
   * @param string $folder
   * @return array
   */
  public function getConfiguration(string $folder): array
  {
    $config = [];
    foreach($this->getConfigurationFiles($folder) as $key=>$path) {
      $config[$key] = require $path;
    }

    return $config;
  }

  /**
   * Все файлы из папки
   *
   * @param string $folder
   * @return array
   */
  protected function getConfigurationFiles(string $folder): array
  {
    $files = [];

    $configPath = realpath($folder);
    dd($configPath);
    foreach (Finder::create()->files()->name('*.php')->in($configPath) as $file) {
        $directory = $this->getNestedDirectory($file, $configPath);

        $files[$directory.basename($file->getRealPath(), '.php')] = $file->getRealPath();
    }

    ksort($files, SORT_NATURAL);

    return $files;
  }

  /**
   * Вложенные папки
   *
   * @param SplFileInfo $file
   * @param [type] $configPath
   * @return void
   */
  protected function getNestedDirectory(SplFileInfo $file, $configPath)
  {
    $directory = $file->getPath();

    if ($nested = trim(str_replace($configPath, '', $directory), DIRECTORY_SEPARATOR)) {
        $nested = str_replace(DIRECTORY_SEPARATOR, '.', $nested).'.';
    }

    return $nested;
  }
}