<?php

namespace App\Http\Controllers;

use App\Entity\Feedback\Feedback;
use App\Entity\Feedback\Services\FeedbackQueries;
use App\Entity\Post\Post;
use App\Entity\Post\Services\PostQueries;
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
    public function __invoke(Request  $request, PostQueries $post)
    {
        dump($post->index());
    }
}