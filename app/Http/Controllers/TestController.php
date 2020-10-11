<?php

namespace App\Http\Controllers;

use App\Entity\Feedback\Services\FeedbackQueries;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FeedbackQueries $serves)
    {
        dump($serves->count());
        dd($serves->index());
    }
}