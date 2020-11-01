<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use VSamovarov\LaravelLocalizer\Localizer;

class LocalizerApiMiddleware
{

    private $localizer;
    public function __construct(Localizer $localizer)
    {
        $this->localizer = $localizer;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // locale

    public function handle(Request $request, Closure $next)
    {
        if ($request->has('locale') && $this->localizer->isSupportedLocale($request->input('locale'))) {
            $this->localizer->setLocale($request->input('locale'));
        } else {
            $this->localizer->setLocale($this->localizer->getDefaultLocale());
        }
        return $next($request);
    }
}