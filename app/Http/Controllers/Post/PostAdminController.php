<?php

namespace App\Http\Controllers\Post;

use App\Entity\Post\Services\IndexAdminMenuItems;
use App\Entity\Post\Services\PostQueries;
use App\Http\Controllers\Controller;
use App\Services\Menu\IndexAdminMenu;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostAdminController extends Controller
{

    const MASS_ACTIONS_ALLOWED = ['delete', 'restore'];

    public function index(Request $request, PostQueries $services)
    {
        return Inertia::render(
            'Post/IndexPost',
            [
                'pageTitle' => __('admin.post.title'),
                'per_page' => $services->getPerPage(),
                'indexMenu' => (new IndexAdminMenu(
                    $services,
                    $request,
                    (new IndexAdminMenuItems)($services),
                    'admin.post.index'
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

    public function edit($id, PostQueries $services)
    {
        return Inertia::render(
            'Post/EditPost',
            [
                'pageTitle' => __('admin.post-edit.title'),
                'data' => $services->byId($id)
            ]
        );
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