<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      // Fix for MySQL < 5.7.7 and MariaDB < 10.2.2
      // https://laravel.com/docs/master/migrations#creating-indexes
      Schema::defaultStringLength(191);

      Blade::directive('get_localized', function($value) {
        // dump($value);
        return $value[$this->app->getLocale()];
      });

      Paginator::useBootstrap();
    }
}