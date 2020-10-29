<?php

namespace App\Services\Menu;

use App\Services\Contracts\ServiceQueries;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

/**
 * Формируем данные для вывода меню списка сущностей на странице
 */
class IndexAdminMenu
{

    private $service;
    private $request;
    private $forbiddenParameters = ['page'];

    /**
     * @param ServiceQueries $service - нужен метод count()
     * @param Request $request
     * @param array $menuItems
     * @param string $routeName
     * @param array $allowedParameters
     */
    public function __construct(ServiceQueries $service, Request $request, array $menuItems, string $routeName, array $allowedParameters = [])
    {
        $this->service = $service;
        $this->request = $request;
        $this->menuItems = $menuItems;
        $this->routeName = $routeName;
        $this->allowedParameters = array_merge($allowedParameters);
    }

    /**
     * Все данные для меню
     *
     * @return array
     */
    public function get(): array
    {
        $menu = [];

        foreach ($this->menuItems as $item) {
            $parameter = $item['parameter'] ?? null;
            $value = $item['value'] ?? null;
            $menu[] = [
                'name' => __($item['name']),
                'url' => $this->url($parameter, $value),
                'active' => $this->isActive($parameter, $value),
                'count' => $this->count($parameter, $value),
            ];
        }
        return $menu;
    }

    /**
     * Активен ли пункт меню
     *
     * @param string|null $parameter
     * @param string|null $value
     * @return boolean
     */
    public function isActive(?string $parameter, ?string $value): bool
    {
        $active = false;
        if (empty($parameter)) {
            $active = empty($this->request->all());
        } elseif ($this->request->has($parameter)) {
            $active = strval($this->request->input($parameter)) === strval($value);
        }
        return $active;
    }

    /**
     * Формируем ссылку пункта меню
     *
     * @param string|null $parameter
     * @param string|null $value
     * @return string
     */
    public function url(?string $parameter, ?string $value): string
    {
        if (empty($parameter)) return route($this->routeName);
        $parameters = array_merge($this->getParameters(), [$parameter => strval($value)]);
        return route($this->routeName, $parameters);
    }

    /**
     * Количество сущностей
     *
     * @param string|null $parameter - имя Query параметра меню
     * @param string|null $value - значение Query параметра меню
     * @return integer
     */
    public function count(?string $parameter, ?string $value): int
    {
        $parameters = array_merge($this->getParameters(), $parameter ? [$parameter => strval($value)] : []);
        return $this->service->count($parameters);
    }


    public function getParameters()
    {
        $parameters = $this->request->except(array_merge(Arr::pluck($this->menuItems, 'parameter'), $this->forbiddenParameters));

        if (!empty($this->allowedParameters)) {
            $parameters = Arr::only($parameters, $this->allowedParameters);
        }
        return $parameters;
    }
}