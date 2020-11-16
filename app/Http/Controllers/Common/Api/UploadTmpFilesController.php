<?php

namespace App\Http\Controllers\Common\Api;

use App\Http\Controllers\Controller;
use App\Services\Storage\UploadTmpFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadTmpFilesController extends Controller
{

  public function __invoke(Request $request, UploadTmpFiles $service)
  {

    $messages = [
      'max'  => 'Размер картинки больше допустимого',
      'mimes' => 'Файл должен быть с расширением jpeg, png, jpg, gif, svg',
      'image'  => 'Загружать возможно только картинку',
    ];

    $validator = Validator::make($request->all(), [
      'files.*' => 'max:8192',
      'files.*' => 'bail|image|mimes:jpeg,png,jpg,gif,svg',
    ], $messages);

    if ($validator->fails()) {
      return response()->json(["message" => $validator->errors()])->setStatusCode(422);
    }

    return response()->json(
      $service->upload($request->file('files'))
    );
  }
}