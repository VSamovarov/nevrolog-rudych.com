<?php

namespace App\Http\Controllers\Feedback;

use App\Entity\Feedback\Requests\FeedbackSubmitRequestForm;
use App\Http\Controllers\Controller;

class FeedbackSubmitController extends Controller
{

  public function __invoke(FeedbackSubmitRequestForm $request)
  {

    return response()->json($request->getDto());
  }
}