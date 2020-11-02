<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use App\Services\Menu\MainAdminMenu;
use Illuminate\Http\Request;

class InertiaShare extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerInertia();
    }

    public function registerInertia()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });
        Inertia::share('query', request()->all());
        Inertia::share('adminSidebarMenu', (new MainAdminMenu())->getItems());
        Inertia::share('locales', app('localizer')->getSupportedLocales());
        Inertia::share('locale', app('localizer')->getLocale());
        Inertia::share([
            'flash' => function () {
                return [
                    'success' => Session::get('success'),
                    'error' => Session::get('error'),
                ];
            },
        ]);
    }
}