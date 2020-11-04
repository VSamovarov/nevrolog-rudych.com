<?php

namespace App\Entity\Post\Rules;

use App\Entity\Post\Services\PostQueries;

use Illuminate\Contracts\Validation\Rule;

class PostType implements Rule
{
    private $services;
    public function __construct(PostQueries $services)
    {
        $this->services = $services;
    }

    /**
     * Проверяем тип поста
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, array_keys($this->services->getTypes()));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Post Type';
    }
}