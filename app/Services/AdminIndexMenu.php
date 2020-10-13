<?php

namespace App\Services;

use App\Services\Contracts\ServiceQueries;
use Illuminate\Http\Request;

/**
 * Формируем данные для вывода меню списка сущностей на странице
 */
class AdminIndexMenu
{

    private $service;
    private $request;

    /**
     * @param ServiceQueries $service - нужен метод count()
     * @param Request $request
     */
    public function __construct(ServiceQueries $service, Request $request)
    {
        $this->service = $service;
        $this->request = $request;
    }

    /**
     * Все данные для меню
     *
     * @param array $menuItems
     * @param string $routeName
     * @param array $allowedParameters
     * @return array
     */
    public function get(array $menuItems, string $routeName, array $allowedParameters = []): array
    {
        $menu = [];
        foreach ($menuItems as $item) {
            $active = $this->isActive($item['parameter'] ?? null, $item['value'] ?? null);
            $url = $this->url($item['parameter'] ?? null, $item['value'] ?? null, $routeName, $allowedParameters);
            $count = $this->count($item['parameter'] ?? null, $item['value'] ?? null);

            $menu[] = [
                'name' => __($item['name']),
                'url' => $url,
                'active' => $active,
                'count' => $count,
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
    public function isActive(?string $parameter = null, ?string $value = null): bool
    {
        $active = false;
        if (empty($parameter)) {
            $active = empty($this->request->all());
        } elseif ($this->request->has($parameter)) {
            $active = $this->request->input($parameter) === strval($value) || ($this->request->input($parameter) === null && empty($value));
        }
        return $active;
    }

    /**
     * Формируем ссылку пункта меню
     *
     * @param string|null $parameter
     * @param string|null $value
     * @param string $routeName
     * @param array $allowedParameters
     * @return string
     */
    public function url(?string $parameter, ?string $value, string $routeName, array $allowedParameters = []): string
    {

        if (empty($parameter)) return route($routeName);

        $parameters = $this->clearParameters($this->request->all(), $allowedParameters);

        if ($this->isActive($parameter, $value) && isset($parameters[$parameter])) {
            unset($parameters[$parameter]);
        } else {
            $parameters = array_merge($parameters, [$parameter => $value]);
        }
        return route($routeName, $parameters);
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
        return $this->service->count(array_merge($this->request->all(), [$parameter => $value]));
    }

    /**
     * Оставляем только разрешенные параметры в запросе
     *
     * @param array $parameters
     * @param array $allowedParameters
     * @return array
     */
    public function clearParameters(array $parameters, array $allowedParameters): array
    {
        if (empty($allowedParameters)) {
            return $parameters;
        } else {
            return array_filter(
                $parameters,
                function ($param) use ($allowedParameters) {
                    return in_array($param, $allowedParameters);
                },
                ARRAY_FILTER_USE_KEY
            );
        }
    }
}