<?php

namespace App\Http\Controllers\Feedback;

use App\Entity\Feedback\Requests\FeedbackRequestForm;
use App\Entity\Feedback\Services\FeedbackCommands;
use App\Entity\Feedback\Services\FeedbackQueries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\Menu\IndexAdminMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class FeedbackAdminController extends Controller
{

    const MASS_ACTIONS_ALLOWED = ['delete', 'restore', 'viewed', 'not-viewed'];
    public $indexMenuItems = [
        [
            'name' => 'Все'
        ],
        [
            'name' => 'Просмотренные',
            'parameter' => 'viewed',
            'value' =>  1,
        ],
        [
            'name' => 'Новые',
            'parameter' => 'viewed',
            'value' =>  0,
        ],
        [
            'name' => 'Удаленные',
            'parameter' => 'deleted'
        ]
    ];


    public function index(Request $request, FeedbackQueries $services)
    {
        return Inertia::render(
            'Feedback/IndexFeedback',
            [
                'pageTitle' => __('Обратная связь'),
                'feedback' => $services->index($request->all()),
                'indexMenu' => (new IndexAdminMenu(
                    $services,
                    $request,
                    $this->indexMenuItems,
                    'admin.feedback.index',
                    []
                ))->get()
            ]
        );
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id, FeedbackQueries $queries)
    {
        return Inertia::render(
            'Feedback/ShowFeedback',
            [
                'feedback' => $queries->byId($id)
            ]
        );
    }


    public function edit($id, FeedbackQueries $queries)
    {
        return Inertia::render(
            'Feedback/EditFeedback',
            [
                'feedback' => $queries->byId($id)
            ]
        );
    }

    public function update(FeedbackRequestForm $request, $id, FeedbackCommands $commands, FeedbackQueries $queries)
    {

        $commands->update($id, $request->getDto());

        return Inertia::render(
            'Feedback/EditFeedback',
            [
                'feedback' => $queries->byId($id)
            ]
        );
    }


    public function destroy($id, FeedbackCommands $commands)
    {
        //
    }

    public function massActions(Request $request, FeedbackCommands $commands, FeedbackQueries $queries)
    {

        $this->validate($request, [
            'name' => 'required|in:' . implode(',', self::MASS_ACTIONS_ALLOWED),
            'data' => 'required|array',
            'data.*' => 'integer'
        ]);
        $ids = $request->input('data');
        switch ($request->input('name')) {
            case 'delete':
                $commands->massDelete($ids);
                break;
            case 'restore':
                $commands->massRestore($ids);
                break;
            case 'viewed':
                $commands->massViewedStatus($ids, true);
                break;
            case 'not-viewed':
                $commands->massViewedStatus($ids, false);
                break;
        }

        return Redirect::route('admin.feedback.index');
    }
}
