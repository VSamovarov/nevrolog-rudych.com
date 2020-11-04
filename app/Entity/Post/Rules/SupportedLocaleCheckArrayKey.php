<?php

namespace App\Entity\Post\Rules;



use Illuminate\Contracts\Validation\Rule;
use VSamovarov\LaravelLocalizer\Localizer;

class SupportedLocaleCheckArrayKey implements Rule
{
    private $localizer;

    public function __construct(Localizer $localizer)
    {
        $this->localizer = $localizer;
    }

    /**
     * Проверяем атрибут(ключ массива), а не значение!!!
     * должно работать в таком выражении 'main-content-module.*',
     * Где звездочка, это локаль
     *
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->localizer->isSupportedLocale(substr(strrchr($attribute, '.'), 1));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "It is not supported locale";
    }
}