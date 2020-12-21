<?php

namespace App\Http\Controllers\Post;

use App\Entity\Post\Services\PostCommands;
use App\Entity\Post\Services\PostQueries;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\Resources\PostsCollectionResource;
use Illuminate\Http\Request;

class PostApiAdminController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, PostQueries $post)
  {
    if ($request->has('type') && in_array($request->input('type'), array_keys($post->getTypes()))) {
      $data = $post->index($request->all());
      return response()->json([
        'total' => $data->total(),
        'perPage' => $data->perPage(),
        'items' => new PostsCollectionResource($data)
      ]);
    } else {
      return response()->json(['message' => 'Bad post type!'], 410);
    }
  }

  /**
   * Удаление
   *
   * @param integer $id
   * @return void
   */
    public function destroy(int $id, PostCommands $command)
    {
      return response()->json($command->destroy($id));
    }
    /**
     * Восстановление удаленного (soft deleted)
     *
     * @param integer $id
     * @return void
     */
    public function restore(int $id, PostCommands $command)
    {
      return response()->json($command->restore($id));
    }
}
