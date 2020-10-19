<?php

namespace App\Http\Controllers;

use App\Entity\Feedback\Services\FeedbackQueries;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request  $request)
    {
        try {
            dd(Carbon::parse('10-2020-05'));
        } catch (\Exception $e) {
            echo 'invalid date, enduser understands the error message';
        }
    }
}