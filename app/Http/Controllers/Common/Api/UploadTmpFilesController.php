<?php

namespace App\Http\Controllers\Common\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadTmpFilesController extends Controller
{
    const TMP_FOLDER = 'tmp/gallery';
    private const MAXIMUM_TIME_FILE_STORAGE = 60 * 60 * 24;
    private const STORAGE_DISK = 'public';
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'files' => 'required',
            'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $path = [];
        foreach ($request->file('files') as $file) {
            // $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->extension();
            // $tmpPath = $file->storeAs(self::TMP_FOLDER, '[' . Str::uuid() . ']' . $name);
            $path[] = [
                'original_name' => $file->getClientOriginalName(),
                'name'          => $name = $file->storeAs(self::TMP_FOLDER, '[' . Str::uuid() . ']' . $file->getClientOriginalName(), self::STORAGE_DISK),
                'url' => Storage::url($name),
            ];
        }
        return response()->json($path);
    }
}