<?php

namespace App\Http\Controllers\Feedback;

use App\Entity\Feedback\Requests\FeedbackSubmitRequestForm;
use App\Entity\Feedback\Services\FeedbackCommands;
use App\Http\Controllers\Controller;
use App\Notifications\NewFeedback;
use App\Notifications\NewFeedbackAdmin;

class FeedbackSubmitController extends Controller
{

  public function __invoke(FeedbackSubmitRequestForm $request, FeedbackCommands $commands)
  {
    $feedback = $commands->create($request->getDto());
    $feedback->notify(new NewFeedback);
    $feedback->notify(new NewFeedbackAdmin);
    $message = "<div><h4>" . __('feedback.received_title'). "</h4>" . __('feedback.received_content') . "</div>";
    return response()->json($message);
  }
}