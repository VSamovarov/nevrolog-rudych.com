<?php

namespace App\Http\Controllers\Common\Api;

use App\Http\Controllers\Controller;
use App\Services\Storage\UploadTmpFiles;
use Illuminate\Http\Request;

class UploadTmpFilesController extends Controller
{

    public function __invoke(Request $request, UploadTmpFiles $service)
    {
        $this->validate($request, [
            'files' => 'required',
            'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg:max:8192'
        ]);

        return response()->json(
            $service->upload($request->file('files'))
        );
    }
}