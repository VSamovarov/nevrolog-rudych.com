<?php

namespace App\Http\Controllers\Feedback;

use App\Entity\Feedback\Requests\FeedbackSubmitRequestForm;
use App\Entity\Feedback\Services\FeedbackCommands;
use App\Entity\User\Services\UserQueries;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Notifications\NewFeedback;
use App\Notifications\NewFeedbackAdmin;
use Illuminate\Support\Facades\Notification;

class FeedbackSubmitController extends Controller
{

  public function __invoke(FeedbackSubmitRequestForm $request, FeedbackCommands $commands, UserQueries $users)
  {
    $feedback = $commands->create($request->getDto());
    if(!empty($feedback->email)) $feedback->notify(new NewFeedback);

    Notification::send($users->getUserByEmails([]), new NewFeedbackAdmin($feedback));

    $message = "<div><h4>" . __('feedback.received_title'). "</h4>" . __('feedback.received_content') . "</div>";
    return response()->json($message);
  }
}