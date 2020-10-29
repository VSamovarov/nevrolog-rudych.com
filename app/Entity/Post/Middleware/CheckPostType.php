<?php

namespace App\Entity\Post\Middleware;

use App\Entity\Post\Services\PostQueries;
use Closure;
use Illuminate\Http\Request;

class CheckPostType
{
    private $services;
    public function __construct(PostQueries $services)
    {
        $this->services = $services;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->validate([
            'type' => 'required|in:' . implode(',', array_keys($this->services->getTypes()))
        ]);
        return $next($request);
    }
}