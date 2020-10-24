<?php

namespace App\Http\Controllers\Feedback;

use App\Entity\Feedback\Feedback;
use App\Entity\Feedback\Services\FeedbackQueries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackAdminApiController extends Controller
{

    /**
     * Данные для показа одного элемента
     *
     * @param integer $id
     * @param FeedbackQueries $queries
     * @return void
     */
    public function show(int $id, FeedbackQueries $queries)
    {
        return response()->json($queries->byId($id, true));
    }

    /**
     * Меняем статус просмотра
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function viewedStatus(Request $request, int $id)
    {
        $feedback = Feedback::findOrFail($id);
        $status = 1;
        if ($request->has('status') && $request->input('status') === 0) {
            $status = 0;
        }

        $feedback->viewed = $status;
        return response()->json($feedback->save());
    }

    /**
     * Удаление
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $feedback = Feedback::withTrashed()->findOrFail($id);
        if ($feedback->trashed()) {
            $feedback->forceDelete();
            return response()->json('deleted');
        } else {
            $feedback->delete();
            return response()->json('soft-deleted');
        }
    }

    /**
     * Восстановление удаленного (soft deleted)
     *
     * @param integer $id
     * @return void
     */
    public function restore(int $id)
    {
        $feedback = Feedback::withTrashed()->findOrFail($id);
        return response()->json($feedback->restore());
    }
}