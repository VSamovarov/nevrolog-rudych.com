<?php

namespace App\Http\Controllers\Feedback;

use App\Entity\Feedback\Feedback;
use App\Entity\Feedback\Services\FeedbackQueries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackAdminApiController extends Controller
{

    public function show($id, FeedbackQueries $queries)
    {
        return response()->json($queries->byId($id));
    }

    public function viewedStatus(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $status = 1;
        if ($request->has('status') && $request->input('status') === 0) {
            $status = 0;
        }
        $feedback->viewed = $status;
        return response()->json($feedback->save());
    }
}
