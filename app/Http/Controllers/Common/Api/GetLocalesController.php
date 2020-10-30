<?php

namespace App\Http\Controllers\Common\Api;

use App\Http\Controllers\Controller;

class GetLocalesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return response()->json(app('localizer')->getSupportedLocales());
    }
}
