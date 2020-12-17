<?php

namespace App\Http\Controllers\Feedback;

use App\Entity\Feedback\Requests\FeedbackSubmitRequestForm;
use App\Entity\Feedback\Services\FeedbackCommands;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Notifications\NewFeedback;
use App\Notifications\NewFeedbackAdmin;
use Exception;
use Illuminate\Support\Facades\Notification;
use Log;

class FeedbackSubmitController extends Controller
{

  public function __invoke(FeedbackSubmitRequestForm $request, FeedbackCommands $commands)
  {
    $feedback = $commands->create($request->getDto());

    $message = "<div><h4>" . __('feedback.received_title'). "</h4>" . __('feedback.received_content') . "</div>";

    try {
      if(!empty($feedback->email)) $feedback->notify(new NewFeedback);
      Notification::send(User::all(), new NewFeedbackAdmin($feedback));
    }  catch (Exception $e) {
      $message .= '<p>><small>@@@@@</small></p>';
    }


    return response()->json($message);
  }
}