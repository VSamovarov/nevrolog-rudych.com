<?php

namespace App\Services\AppSettings;

use App\Services\ConfigsLoader\ConfigsLoader;

class ConfigSettings
{
  private $configs;
  private $folderConfigs = 'config';

  public function __construct(ConfigsLoader $configsLoader)
  {

    $this->configs = $configsLoader->get(__DIR__. '/' . $this->folderConfigs);
  }

  public function getConfigs(): array
  {
    return $this->configs;
  }

  public function getConfigsByGroup(string $group): array
  {
    if(array_key_exists($group, $this->getConfigs())){
      return $this->getConfigs()[$group];
    } else{
      return [];
    }
  }

  public function getGroupSettings(): array
  {
    return $groups = array_keys($this->getConfigs());
  }
}