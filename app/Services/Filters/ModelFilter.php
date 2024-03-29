<?php

namespace App\Services\Filters;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;

/**
 * Фильтр для моделей
 * по мотивам
 * https://github.com/Tucker-Eric/EloquentFilter
 */
abstract class ModelFilter
{

    /**
     * Array of input to filter.
     *
     * @var array
     */
    protected $input;

    /**
     * @var QueryBuilder
     */
    protected $query;

    /**
     * Convert input keys to camelCase
     * Ex: my_awesome_key will be converted to myAwesomeKey($value).
     *
     * @var bool
     */
    protected $camel_cased_methods = true;

    /**
     * Drop `_id` from the end of input keys when referencing methods.
     *
     * @var bool
     */
    protected $drop_id = true;

    /**
     * ModelFilter constructor.
     *
     * @param $query
     * @param array $input - входные параметры.
     * Должны приходить уже очищенными.
     *
     */
    public function __construct($query, array $input = [])
    {
        $this->query = $query;
        $this->input = $input;

        $this->registerMacros();
    }
    /**
     * Handle all filters.
     *
     * @return QueryBuilder
     */
    public function handle()
    {
        // Run input filters
        $this->filterInput();
        return $this->query;
    }

    /**
     * Filter with input array.
     */
    public function filterInput()
    {
        foreach ($this->input as $key => $val) {
            // Call all local methods on filter
            $method = $this->getFilterMethod($key);
            if ($this->methodIsCallable($method)) {
                $this->{$method}($val);
            }
        }
    }


    /**
     * @param $key
     * @return string
     */
    public function getFilterMethod($key)
    {
        // Remove '.' chars in methodName
        $methodName = str_replace('.', '', $this->drop_id ? preg_replace('/^(.*)_id$/', '$1', $key) : $key);

        // Convert key to camelCase?
        return $this->camel_cased_methods ? Str::camel($methodName) : $methodName;
    }

    /**
     * Check if the method is callable on the extended class.
     * @param $method
     * @return bool
     */
    public function methodIsCallable($method)
    {
        return  method_exists($this, $method) && !method_exists(ModelFilter::class, $method);
    }


    /**
     * Register paginate and simplePaginate macros on relations
     * BelongsToMany overrides the QueryBuilder's paginate to append the pivot.
     */
    private function registerMacros()
    {
        if (
            method_exists(Relation::class, 'hasMacro') &&
            method_exists(Relation::class, 'macro') &&
            !Relation::hasMacro('paginateFilter') &&
            !Relation::hasMacro('simplePaginateFilter')
        ) {
            Relation::macro('paginateFilter', function () {
                $paginator = call_user_func_array([$this, 'paginate'], func_get_args());
                $paginator->appends($this->input);

                return $paginator;
            });
            Relation::macro('simplePaginateFilter', function () {
                $paginator = call_user_func_array([$this, 'simplePaginate'], func_get_args());
                $paginator->appends($this->input);

                return $paginator;
            });
        }
    }
}
