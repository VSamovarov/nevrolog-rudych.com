<?php

namespace App\Http\Controllers\Post;

use App\Entity\Post\Services\PostCommands;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddImageToContentPostApiAdminController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke($id, Request $request, PostCommands $commands)
  {
    $request->validate([
      'image' => 'max:8192',
      'image' => 'bail|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    $image = $commands->addImage($id, $request->file('image')->getPathName(), $request->file('image')->getClientOriginalName());
    return response()->json($image);
  }
}