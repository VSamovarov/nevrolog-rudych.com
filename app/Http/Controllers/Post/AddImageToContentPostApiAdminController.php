<?php

namespace App\Http\Controllers\Post;

use App\Entity\Post\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddImageToContentPostApiAdminController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke($id, Request $request)
  {
    $request->validate([
      'image' => 'max:8192',
      'image' => 'bail|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    $post = Post::findOrFail($id);

    $image = $post->addMediaFromRequest('image')
      ->toMediaCollection();

    return response()->json($image->getUrl());
  }
}