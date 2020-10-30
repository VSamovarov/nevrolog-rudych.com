<?php

namespace App\Http\Controllers\Post;

use App\Entity\Post\Services\PostQueries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostIndexApiAdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PostQueries $post)
    {
        if ($request->has('type') && in_array($request->input('type'), array_keys($post->getTypes()))) {
            return response()->json($post->index($request->all()));
        } else {
            return response()->json(['message' => 'Bad post type!'], 410);
        }
    }
}