<?php

namespace App\Http\Controllers;

use App\Entity\Feedback\Feedback;
use App\Entity\Feedback\Services\FeedbackQueries;
use App\Entity\Post\Post;
use App\Entity\Post\Services\PostQueries;
use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\ConfigsLoader\ConfigsLoader;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
      $load = new ConfigsLoader();

      dump($load->get(app_path('Services/AppSettings/config'),true));
      dump($load->get(app_path('Services/AppSettings/config')));
      dump($load->get(app_path('Services/AppSettings/config')));
      dump($load->get(app_path('Services/AppSettings/config')));
      dump($load->get(app_path('Services/AppSettings/config')));
      dump($load->get(app_path('Services/AppSettings/config')));
    }
}