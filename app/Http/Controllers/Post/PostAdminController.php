<?php

namespace App\Http\Controllers\Post;

use App\Entity\Post\Requests\PostUpdateRequest;
use App\Entity\Post\Services\IndexAdminMenuItems;
use App\Entity\Post\Services\PostCommands;
use App\Entity\Post\Services\PostQueries;
use App\Http\Controllers\Controller;
use App\Services\Menu\IndexAdminMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostAdminController extends Controller
{

  const MASS_ACTIONS_ALLOWED = ['delete', 'restore'];

  public function index(Request $request, PostQueries $services)
  {
    return Inertia::render(
      'Post/IndexPost',
      [
        'pageTitle' => $services->getType($request->input('type'))['name'],
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

  public function create(Request $request, PostCommands $commands)
  {
    $item = $commands->create($request->input('type'));
    return Redirect::route('admin.post.edit', $item->id);
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
    $main = $services->byId($id);
    $main->thumbnail = $main->thumbnail?$main->thumbnail->getUrl():null;
    return Inertia::render(
      'Post/EditPost',
      [
        'pageTitle' => 'Редактирование документа',
        'main' => $main,
        'statuses' => $services->getStatuses(),
        'slugs' => $services->getSlugs(),
        'settings' => $services->getType($main->type),
      ]
    );
  }

  public function update($id, PostUpdateRequest $request, PostCommands $commands)
  {

    $commands->update($id, $request->getDto());

    return Redirect::route('admin.post.edit', $id);
  }

  public function destroy($id)
  {
    //
  }

  public function massActions(Request $request, PostCommands $commands)
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
      }

      return Redirect::route('admin.post.index',['type'=>$request->input('type')]);
  }
}