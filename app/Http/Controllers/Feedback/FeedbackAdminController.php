<?php

namespace App\Http\Controllers\Feedback;

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
    public function show($id, FeedbackQueries $services)
    {
        return Inertia::render(
            'Feedback/EditFeedback',
            [
                'feedback' => $services->byId($id)
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
    public function update(Request $request, $id)
    {
        dump($id);
        dd($request->all());
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