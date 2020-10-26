<?php

namespace App\Http\Controllers\Post;

use App\Entity\Post\Services\PostQueries;
use App\Http\Controllers\Controller;
use App\Services\AdminIndexMenu;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostAdminController extends Controller
{

    const MASS_ACTIONS_ALLOWED = ['delete', 'restore'];
    public $indexMenuItems = [
        [
            'name' => 'admin.all'
        ],
        [
            'name' => 'admin.deleted',
            'parameter' => 'deleted'
        ]
    ];

    public function index(Request $request, PostQueries $services)
    {
        return Inertia::render(
            'Feedback/IndexFeedback',
            [
                'pageTitle' => __('admin.feedback.title'),
                'posts' => $services->index($request->all()),
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

    public function create($type)
    {
        //
    }

    public function store($type, Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}