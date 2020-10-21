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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, FeedbackQueries $queries)
    {
        return Inertia::render(
            'Feedback/ShowFeedback',
            [
                'feedback' => $queries->byId($id)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
