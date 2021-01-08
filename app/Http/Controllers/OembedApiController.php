<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Embed\Embed;


class OembedApiController extends Controller
{
  public function __invoke(Request $request)
  {

    $request->validate(['url' => 'required|url']);

    $url = $request->input('url');

    if (Cache::has("embed:{$url}")) {
      $data =  Cache::get("embed:{$url}");
    } else {
      try {
        $data = Embed::create($url);
      } catch (\Throwable $th) {
        $data = null;
      }
      Cache::put("embed:{$url}", $data);
    }

    if($data) {
      return response()->json(["html"=> $data->code,"aspectRatio"=> $data->aspectRatio, "providerName" => $data->providerName]);
    } else {
      return response()->json([
        'error' => [
            'message' => 'Don`t load $url'
        ]
      ], 422);
    }
  }
}
