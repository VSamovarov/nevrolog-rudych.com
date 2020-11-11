<?php

namespace App\Http\Controllers;

use App\Entity\Feedback\Feedback;
use App\Entity\Feedback\Services\FeedbackQueries;
use App\Entity\Post\Post;
use App\Entity\Post\Services\PostQueries;
use App\Services\Helper;
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
    public function __invoke(Request  $request, Helper $helper)
    {
        $name = 'dffff.ghhhh.12345.gif';
        $ext = mb_substr(strrchr($name, '.'), 1);
        $basename = mb_substr($name, 0,  - (mb_strlen($ext) + 1));
        dd(helper::normalizeFileName($name));
        // phpinfo();
    }
}