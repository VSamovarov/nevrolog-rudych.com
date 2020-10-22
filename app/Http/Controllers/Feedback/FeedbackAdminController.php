<?php

namespace App\Http\Controllers\Feedback;

use App\Entity\Feedback\Requests\FeedbackRequestForm;
use App\Entity\Feedback\Services\FeedbackCommands;
use App\Entity\Feedback\Services\FeedbackQueries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\AdminIndexMenu;

class FeedbackAdminController extends Controller
{

    public $indexMenuItems = [
        [
            'name' => 'admin.all'
        ],
        [
            'name' => 'admin.viewed',
            'parameter' => 'viewed',
            'value' =>  1,
        ],
        [
            'name' => 'admin.not-viewed',
            'parameter' => 'viewed',
            'value' =>  0,
        ],
        [
            'name' => 'admin.deleted',
            'parameter' => 'deleted'
        ]
    ];


    public function index(Request $request, FeedbackQueries $services)
    {
        // dd((new AdminIndexMenu($services, $request))->get($this->indexMenuItems, 'admin.feedback.index'));
        return Inertia::render(
            'Feedback/IndexFeedback',
            [
                'pageTitle' => __('admin.feedback.title'),
                'feedback' => $services->index($request->all()),
                'indexMenu' => (new AdminIndexMenu(
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
}