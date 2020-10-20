<?php

namespace App\Http\Controllers;

use App\Entity\Feedback\Feedback;
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
    public function __invoke(Request  $request, Feedback $feedback)
    {
        $f = $feedback::find(5555555555555555);
        dd($f);
    }
}