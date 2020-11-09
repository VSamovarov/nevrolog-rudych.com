<?php

namespace App\Services\Storage;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadTmpFiles
{
    const FOLDER = '';
    private const STORAGE_DISK = 'tmp';
    private const MAXIMUM_TIME_FILE_STORAGE = 60 * 60 * 24;

    private $storage;
    private $folder;
    private $driver;

    public function __construct($folder = self::FOLDER, $driver = self::STORAGE_DISK)
    {
        $this->driver = $driver;
        $this->folder = $folder;
        $this->storage = Storage::disk($this->driver);
    }

    public function upload(array $files): array
    {
        $data = [];
        foreach ($files as $file) {
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->extension();
            $path = $file->storeAs($this->folder, '[' . Str::uuid() . ']' . $name, $this->driver);
            $data[] = [
                'original_name' => $file->getClientOriginalName(),
                'path'         => $this->storage->path($path),
                'url'          => $this->storage->url($path),
            ];
        }
        return $data;
    }
    /**
     * Убираем мусор во временной папке
     * Удаляем все файлы, старше определенного времени
     */
    public function garbageCollector()
    {
        $files = $this->storage->files(self::FOLDER);
        foreach ($files as $file) {
            if (time() - $this->storage->lastModified($file) > self::MAXIMUM_TIME_FILE_STORAGE) {
                $this->storage->delete($file);
            }
        }
    }
}