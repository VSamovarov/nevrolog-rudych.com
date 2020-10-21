<?php

namespace App\Http\Controllers\Feedback;

use App\Entity\Feedback\Services\FeedbackQueries;
use App\Http\Controllers\Controller;

class FeedbackAdminApiController extends Controller
{

    public function show($id, FeedbackQueries $queries)
    {
        return response()->json($queries->byId($id));
    }
}